<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 */
class AddToDocBlockTest extends \App\Test\AbstractAppTest
{
}

?>
-----
<?php

namespace Basster\PhpUnitToGroupRector\Tests\Rector\Class_\PhpUnitClassToGroupRector\FixtureConfiguredFully;

/**
 * This is here
 * @group app
 */
class AddToDocBlockTest extends \App\Test\AbstractAppTest
{
}

?>
