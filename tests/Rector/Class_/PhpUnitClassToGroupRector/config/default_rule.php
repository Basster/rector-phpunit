<?php

declare(strict_types=1);

use Basster\PhpUnitToGroupRector\Rector\Class_\PhpUnitClassToGroupRector;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(PhpUnitClassToGroupRector::class);
};
