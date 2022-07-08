<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 */
class AddToDocBlockTest extends \App\Test\AbstractAppTest
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 * @group app
 */
class AddToDocBlockTest extends \App\Test\AbstractAppTest
{
}

?>
