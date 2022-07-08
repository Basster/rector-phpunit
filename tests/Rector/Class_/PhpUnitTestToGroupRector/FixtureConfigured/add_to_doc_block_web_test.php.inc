<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfigured;

/**
 * This is here
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
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
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
