<?php

declare(strict_types=1);

use Basster\SymfonyPhpUnitRector\Rector\Class_\PhpUnitKernelTestToSlowGroupRector;
use Basster\SymfonyPhpUnitRector\ValueObject\PhpUnitKernelTestToSlowGroup;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        PhpUnitKernelTestToSlowGroupRector::class,
        [new PhpUnitKernelTestToSlowGroup('kernel')]
    );
};
