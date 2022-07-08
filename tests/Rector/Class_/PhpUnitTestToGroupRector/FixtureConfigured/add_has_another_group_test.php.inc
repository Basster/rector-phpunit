<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfigured;

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

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfigured;

/**
 * This is here
 * @group slow
 * @group kernel
 */
class AddHasAnotherGroupTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
