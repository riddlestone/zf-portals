<?php

namespace Riddlestone\ZF\Portals\Test;

use PHPUnit\Framework\TestCase;
use Riddlestone\ZF\Portals\Module;

class ModuleTest extends TestCase
{
    public function testGetConfig()
    {
        $module = new Module();
        $config = $module->getConfig();
        $this->assertIsArray($config);
        $this->assertArrayHasKey('main', $config);
    }
}
