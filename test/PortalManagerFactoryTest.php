<?php

namespace Riddlestone\ZF\Portals\Test;

use Exception;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use PHPUnit\Framework\TestCase;
use Riddlestone\ZF\Portals\PortalManager;
use Riddlestone\ZF\Portals\PortalManagerFactory;
use stdClass;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;

class PortalManagerFactoryTest extends TestCase
{

    /**
     * @throws ContainerException
     * @covers \Riddlestone\ZF\Portals\PortalManagerFactory::__invoke
     */
    public function test__invoke()
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->method('get')
            ->willReturnCallback(function ($id) {
                switch ($id) {
                    case 'Config':
                        return [
                            'portals' => [
                                'main' => [
                                    'foo' => 'bar',
                                ],
                            ],
                        ];
                    default:
                        throw new ServiceNotFoundException();
                }
            });
        $factory = new PortalManagerFactory();

        $portalManager = $factory($container, PortalManager::class);
        $this->assertInstanceOf(PortalManager::class, $portalManager);

        try {
            $factory($container, stdClass::class);
            $this->fail('Factory built an invalid object');
        } catch(ServiceNotCreatedException $e) {
            $this->assertInstanceOf(ServiceNotCreatedException::class, $e);
        }
    }
}
