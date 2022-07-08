<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfigured;

/**
 * This is here
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfigured;

/**
 * This is here
 * @group kernel
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
