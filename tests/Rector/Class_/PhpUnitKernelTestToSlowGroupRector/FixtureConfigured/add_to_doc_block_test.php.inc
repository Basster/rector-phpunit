<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\FixtureConfigured;

/**
 * This is here
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
-----
<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\FixtureConfigured;

/**
 * This is here
 * @group kernel
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
