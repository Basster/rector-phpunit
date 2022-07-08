<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\Fixture;

/**
 * This is here
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
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
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
