<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\Fixture;

/**
 * This is here
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
-----
<?php

namespace Basster\SymfonyPhpUnitRector\Tests\Rector\Class_\PhpUnitKernelTestToSlowGroupRector\Fixture;

/**
 * This is here
 * @group slow
 */
class AddToDocBlockWebTest extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{
}

?>
