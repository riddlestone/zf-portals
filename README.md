# [![Riddlestone](https://avatars0.githubusercontent.com/u/57593244?s=30&v=4)](https://github.com/riddlestone) ZF-Portals

A module to pull configuration together for portals, such as a public portal, an admin portal, etc.

> ## Repository archived 2020-02-06
>
> This repository has moved to [riddlestone/brokkr-portals](https://github.com/riddlestone/brokkr-portals).

## Adding Configuration

To add information about a portal, add it to a module configuration file under `portals.{portal_name}`:

```php
return [
    'portals' => [
        'main' => [
            'layout' => 'main.layout',
            'resources' => [
                __DIR__ . '/../css/styles.css',
                __DIR__ . '/../js/scripts.js',
            ],
        ],
    ],
];
```

Alternatively, you can merge new configuration in manually if needed:

```php
/** @var \Riddlestone\ZF\Portals\PortalManager $portalManager */

$portalManager->mergeConfig(
    [
        'main' => [
            'resources' => [
                'another.css',
            ],
        ],
    ]
);
```

## Getting the Portal Manager
```php
/** @var \Zend\ServiceManager\ServiceManager $serviceManager */

$portalManager = $serviceManager->get(\Riddlestone\ZF\Portals\PortalManager::class);
```

## Getting Configuration

```php
/** @var \Riddlestone\ZF\Portals\PortalManager $portalManager */

# get a list of portals
$portals = $portalManager->getPortalNames();

# get the current portal name
$portal = $portalManager->getCurrentPortalName();

# get the config for a portal
$portalConfig = $portalManager->getPortalConfig('main');

# get the config for the current portal
$portalConfig = $portalManager->getCurrentPortalConfig();
```
