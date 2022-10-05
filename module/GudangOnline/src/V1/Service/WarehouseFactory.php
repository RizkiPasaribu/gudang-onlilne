<?php

namespace GudangOnline\V1\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class WarehouseFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config')['warehouse'];
        $warehouseService = new Warehouse();
        $warehouseService->setConfig($config);
        return $warehouseService;
    }
}
