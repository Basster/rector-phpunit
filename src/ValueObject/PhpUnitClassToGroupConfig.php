<?php

declare(strict_types=1);

namespace Basster\PhpUnitToGroupRector\ValueObject;

final class PhpUnitClassToGroupConfig
{
    public function __construct(
        public readonly string $name,
        public readonly string $targetClassname,
    ) {
    }
}
