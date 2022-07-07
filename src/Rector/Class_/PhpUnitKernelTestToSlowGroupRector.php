<?php

declare(strict_types=1);

namespace Basster\SymfonyPhpUnitRector\Rector\Class_;

use PhpParser\Node;
use PhpParser\Node\Stmt\Class_;
use PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode;
use PHPStan\Reflection\ClassReflection;
use Rector\Core\Rector\AbstractRector;
use Rector\Core\Reflection\ReflectionResolver;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

final class PhpUnitKernelTestToSlowGroupRector extends AbstractRector
{
    /**
     * @var string
     */
    private const GROUP = 'slow';

    public function __construct(
        private readonly ReflectionResolver $reflectionResolver
    )
    {
    }

    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('foobar', []);
    }

    public function getNodeTypes(): array
    {
        return [Class_::class];
    }

    /**
     * @param Class_ $node
     */
    public function refactor(Node $node): ?Node
    {
        $className = $this->getName($node);
        if (null === $className) {
            return null;
        }
        if ($this->shouldSkipClass($node)) {
            return null;
        }
        $classReflection = $this->reflectionResolver->resolveClassReflection($node);
        if (!$classReflection instanceof ClassReflection) {
            return null;
        }

        if ($classReflection->isSubclassOf('\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase')) {
            $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($node);

            $phpDocTagNode = $this->createGroupPhpDocTagNode();
            $phpDocInfo->addPhpDocTagNode($phpDocTagNode);
        }

        return $node;
    }

    private function shouldSkipClass(Class_ $class): bool
    {
        // skip classes that don't extend anything.
        return !$class->extends;
    }

    private function createGroupPhpDocTagNode(): PhpDocTagNode
    {
        return new \PHPStan\PhpDocParser\Ast\PhpDoc\PhpDocTagNode('@group', new \PHPStan\PhpDocParser\Ast\PhpDoc\GenericTagValueNode(self::GROUP));
    }
}
