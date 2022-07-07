<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\Fixture;

/**
 * This is here
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
-----
<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\Fixture;

/**
 * This is here
 * @group slow
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
