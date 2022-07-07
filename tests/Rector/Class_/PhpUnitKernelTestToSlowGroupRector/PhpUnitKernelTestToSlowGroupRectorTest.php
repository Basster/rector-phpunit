<?php

declare(strict_types=1);

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector;

use Iterator;
use Rector\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

/**
 * @internal
 */
final class PhpUnitKernelTestToSlowGroupRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     *
     * @test
     */
    public function refactor(SmartFileInfo $fileInfo): void
    {
        $this->doTestFileInfo($fileInfo);
    }

    /**
     * @return Iterator<SmartFileInfo>
     */
    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    public function provideConfigFilePath(): string
    {
        return __DIR__ . '/config/configured_rule.php';
    }
}
