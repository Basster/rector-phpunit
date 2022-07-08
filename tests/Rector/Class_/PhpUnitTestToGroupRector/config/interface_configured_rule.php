<?php

declare(strict_types=1);

use App\Test\AppTestInterface;

use Basster\Rector\PhpUnit\Rector\Class_\PhpUnitTestToGroupRector;
use Basster\Rector\PhpUnit\ValueObject\PhpUnitTestToGroup;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        PhpUnitTestToGroupRector::class,
        [new PhpUnitTestToGroup('foobar', AppTestInterface::class)]
    );
};
