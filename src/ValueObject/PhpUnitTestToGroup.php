<?php

declare(strict_types=1);

namespace Basster\Rector\PhpUnit\ValueObject;

final class PhpUnitTestToGroup
{
    public function __construct(
        public readonly string $name,
        public readonly string $targetClassname,
    ) {
    }
}
