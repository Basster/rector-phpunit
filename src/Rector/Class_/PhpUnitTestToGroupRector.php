<?php

declare(strict_types=1);

namespace Basster\Rector\PhpUnit\Rector\Class_;

use Basster\Rector\PhpUnit\ValueObject\PhpUnitTestToGroup;
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
 * @see \Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\PhpUnitTestToGroupRectorTest
 * @see \Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\ConfiguredPhpUnitClassToGroupRectorTest
 * @see \Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FullyConfiguredPhpUnitClassToGroupRectorTest
 */
final class PhpUnitTestToGroupRector extends AbstractRector implements ConfigurableRectorInterface
{
    /**
     * @var string
     */
    public const DEFAULT_GROUP = 'slow';

    /**
     * @var string
     */
    public const DEFAULT_TARGET_CLASSNAME = '\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase';

    /**
     * @var string
     */
    private const TAG = 'group';

    private PhpUnitTestToGroup $config;

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver
    ) {
        $this->config = new PhpUnitTestToGroup(self::DEFAULT_GROUP, self::DEFAULT_TARGET_CLASSNAME);
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('Add `@group <group>` docblock annotation to classes inheriting from given targetClass', [
            new ConfiguredCodeSample(
                <<<'CODE_SAMPLE'
class SomeKernelTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
/**
 * @group slow
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}
CODE_SAMPLE
                ,
                [
                    self::TAG => [
                        new PhpUnitTestToGroup('slow', '\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase'),
                    ],
                ]
            ),
            new ConfiguredCodeSample(
                <<<'CODE_SAMPLE'
// \Symfony\Bundle\FrameworkBundle\Test\WebTestCase inherits from '\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase'
class SomeKernelTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}
CODE_SAMPLE
                ,
                <<<'CODE_SAMPLE'
/**
 * @group slow
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}
CODE_SAMPLE
                ,
                [
                    self::TAG => [
                        new PhpUnitTestToGroup('slow', '\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase'),
                    ],
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

        if (! $classReflection->isSubclassOf($this->config->targetClassname)) {
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
        Assert::allIsInstanceOf($configuration, PhpUnitTestToGroup::class);
        Assert::count($configuration, 1);
        $this->config = $configuration[0];
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
        return new PhpDocTagNode('@' . self::TAG, new GenericTagValueNode($this->config->name));
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
            if ($possibleGroupName === $this->config->name) {
                return true;
            }
        }

        return false;
    }
}
