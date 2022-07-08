<?php
declare(strict_types=1);

namespace App\Test;

use PHPUnit\Framework\TestCase;

if (class_exists('App\Test\AbstractAppTest')) {
    return;
}

abstract class AbstractAppTest extends TestCase
{
}
