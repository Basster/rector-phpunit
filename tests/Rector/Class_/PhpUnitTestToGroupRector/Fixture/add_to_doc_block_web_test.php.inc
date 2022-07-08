<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\Fixture;

/**
 * This is here
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\Fixture;

/**
 * This is here
 * @group slow
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
