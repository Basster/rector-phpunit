<?php

declare(strict_types=1);

use Basster\SymfonyPhpUnitRector\Rector\Class_\PhpUnitKernelTestToSlowGroupRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(PhpUnitKernelTestToSlowGroupRector::class);
};
