<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\InterfaceFixture;

use App\Test\AppTestInterface;

/**
 * This is here
 */
class AddToDocBlockTest implements AppTestInterface
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\InterfaceFixture;

use App\Test\AppTestInterface;

/**
 * This is here
 * @group foobar
 */
class AddToDocBlockTest implements AppTestInterface
{
}

?>
