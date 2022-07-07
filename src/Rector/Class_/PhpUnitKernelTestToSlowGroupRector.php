<?php

declare(strict_types=1);

namespace Basster\SymfonyPhpUnitRector\Rector\Class_;

use Basster\SymfonyPhpUnitRector\ValueObject\PhpUnitKernelTestToSlowGroup;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\PhpDocParser\Ast\PhpDoc\GenericTagValueNode;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode;
use PHPStan\Reflection\ClassReflection;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfo;
use Rector\Core\Contract\Rector\ConfigurableRectorInterface;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\Reflection\ReflectionResolver;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
use Webmozart\Assert\Assert;

/**
 * @see \Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\PhpUnitKernelTestToSlowGroupRectorTest
 */
final class PhpUnitKernelTestToSlowGroupRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * @var string
     */
    public const DEFAULT_GROUP = 'slow';

    /**
     * @var string
     */
    private const TAG = 'group';

    private PhpUnitKernelTestToSlowGroup $group;

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver
    ) {
        $this->group = new PhpUnitKernelTestToSlowGroup(self::DEFAULT_GROUP);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('foobar', [
            new ConfiguredCodeSample(
                <<<'CODE_SAMPLE'

CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'

CODE_SAMPLE
                ,
                [
                    self::TAG => [new PhpUnitKernelTestToSlowGroup('slow')],
                ]
            ),
        ]);
    }

    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    public function refactor(Class_|Node $node): ?Node
    {
        $className = $this->getName($node);
        if ($className === null) {
            return null;
        }
        if ($this->shouldSkipClass($node)) {
            return null;
        }
        $classReflection = $this->reflectionResolver->resolveClassReflection($node);
        if (! $classReflection instanceof ClassReflection) {
            return null;
        }

        if (! $classReflection->isSubclassOf('\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase')) {
            return null;
        }

        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);

        if ($this->hasAlreadyGroupAnnotation($phpDocInfo)) {
            return null;
        }

        $phpDocTagNode = $this->createGroupPhpDocTagNode();
        $phpDocInfo->addPhpDocTagNode($phpDocTagNode);

        return $node;
    }

    public function configure(array $configuration): void
    {
        Assert::allIsInstanceOf($configuration, PhpUnitKernelTestToSlowGroup::class);
        Assert::count($configuration, 1);
        $this->group = $configuration[0];
    }

    private function shouldSkipClass(Node|Class_ $class): bool
    {
        if (! $class instanceof Class_) {
            return true;
        }
        return $class->extends === null;
    }

    private function createGroupPhpDocTagNode(): PhpDocTagNode
    {
        return new PhpDocTagNode('@' . self::TAG, new GenericTagValueNode($this->group->name));
    }

    /**
     * @param PhpDocInfo<PhpDocTagNode> $phpDocInfo
     */
    private function hasAlreadyGroupAnnotation(PhpDocInfo $phpDocInfo): bool
    {
        /** @var PhpDocTagNode[] $groupPhpDocTagNodes */
        $groupPhpDocTagNodes = $phpDocInfo->getTagsByName(self::TAG);

        foreach ($groupPhpDocTagNodes as $groupPhpDocTagNode) {
            if (! $groupPhpDocTagNode->value instanceof GenericTagValueNode) {
                continue;
            }

            $possibleGroupName = $groupPhpDocTagNode->value->value;

            // annotation already exists
            if ($possibleGroupName === $this->group->name) {
                return true;
            }
        }

        return false;
    }
}
