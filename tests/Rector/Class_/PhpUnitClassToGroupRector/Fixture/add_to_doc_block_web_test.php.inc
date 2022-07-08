<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\Fixture;

/**
 * This is here
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
-----
<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\Fixture;

/**
 * This is here
 * @group slow
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
