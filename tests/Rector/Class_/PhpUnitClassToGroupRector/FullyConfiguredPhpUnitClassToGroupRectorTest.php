<?php

declare(strict_types=1);

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

/**
 * @internal
 */
final class FullyConfiguredPhpUnitClassToGroupRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/FixtureConfiguredFully');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/fully_configured_rule.php';
    }
}
