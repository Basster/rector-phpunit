<?php

declare(strict_types=1);

namespace Basster\SymfonyPhpUnitRector\ValueObject;

final class PhpUnitKernelTestToSlowGroup
{
    public function __construct(
        public readonly string $name
    ) {
    }
}
