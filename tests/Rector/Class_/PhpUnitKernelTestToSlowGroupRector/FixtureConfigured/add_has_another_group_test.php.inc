<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\FixtureConfigured;

/**
 * This is here
 * @group slow
 */
class AddHasAnotherGroupTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
-----
<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\FixtureConfigured;

/**
 * This is here
 * @group slow
 * @group kernel
 */
class AddHasAnotherGroupTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
