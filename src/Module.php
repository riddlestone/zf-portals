<?php

namespace Riddlestone\ZF\Portals;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        return require __DIR__ . '/../config/module.config.php';
    }
}
