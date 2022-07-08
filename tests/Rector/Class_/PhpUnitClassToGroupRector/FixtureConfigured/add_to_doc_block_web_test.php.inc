<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfigured;

/**
 * This is here
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
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
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
