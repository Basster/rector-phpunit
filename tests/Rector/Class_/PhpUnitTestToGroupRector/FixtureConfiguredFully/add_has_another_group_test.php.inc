<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 * @group slow
 */
class AddHasAnotherGroupTest extends \App\Test\AbstractAppTest
{
}

?>
-----
<?php

namespace Basster\Rector\PhpUnit\Tests\Rector\Class_\PhpUnitTestToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 * @group slow
 * @group app
 */
class AddHasAnotherGroupTest extends \App\Test\AbstractAppTest
{
}

?>
