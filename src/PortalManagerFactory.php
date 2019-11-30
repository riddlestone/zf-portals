<?php


namespace Riddlestone\ZF\Portals;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class PortalManagerFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // Check we have a valid object
        if (! is_a($requestedName, PortalManager::class, true)) {
            throw new ServiceNotCreatedException(sprintf(
                '%s is not an instance of %s',
                $requestedName,
                PortalManager::class
             ));
        }

        // get the config
        $config = $container->get('Config')['portals'];

        return new $requestedName($config);
    }
}
