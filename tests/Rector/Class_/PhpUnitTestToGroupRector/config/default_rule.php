<?php

declare(strict_types=1);

use Basster\Rector\PhpUnit\Rector\Class_\PhpUnitTestToGroupRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(PhpUnitTestToGroupRector::class);
};
