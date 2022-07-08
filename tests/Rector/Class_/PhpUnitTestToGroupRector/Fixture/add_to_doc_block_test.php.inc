<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\Fixture;

class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\Fixture;

/**
 * @group slow
 */
class AddToDocBlockTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{
}

?>
