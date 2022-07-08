<?php

declare(strict_types=1);

use Basster\Rector\PhpUnit\Rector\Class_\PhpUnitTestToGroupRector;
use Basster\Rector\PhpUnit\ValueObject\PhpUnitTestToGroup;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(
        PhpUnitTestToGroupRector::class,
        [new PhpUnitTestToGroup('kernel', '\Symfony\Bundle\FrameworkBundle\Test\KernelTestCase')]
    );
};
