<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfigured;

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

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfigured;

/**
 * This is here
 * @group slow
 * @group kernel
 */
class AddHasAnotherGroupTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
