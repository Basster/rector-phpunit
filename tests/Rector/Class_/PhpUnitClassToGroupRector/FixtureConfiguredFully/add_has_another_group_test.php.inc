<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfiguredFully;

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

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 * @group slow
 * @group app
 */
class AddHasAnotherGroupTest extends \App\Test\AbstractAppTest
{
}

?>
