<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfigured;

/**
 * This is here
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
-----
<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfigured;

/**
 * This is here
 * @group kernel
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
