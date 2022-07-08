<?php

declare(strict_types=1);

use Basster\PhpUnitToGroupRector\Rector\Class_\PhpUnitClassToGroupRector;
use Basster\PhpUnitToGroupRector\ValueObject\PhpUnitClassToGroupConfig;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        PhpUnitClassToGroupRector::class,
        [new PhpUnitClassToGroupConfig('app', '\App\Test\AbstractAppTest')]
    );
};
