<?php

namespace GudangOnline\V1\Service\Listener;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class WarehouseProductEventListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $fileConfig  = $container->get('Config')['warehouse_product']['files'];
        $warehouseProductMapper = $container->get(\GudangOnline\Mapper\WarehouseProduct::class);
        $warehouseProductHydrator = $container->get('HydratorManager')->get('GudangOnline\Hydrator\WarehouseProduct');
        $warehouseProductEventListener = new WarehouseProductEventListener(
            $warehouseProductMapper
        );
        $warehouseProductEventListener->setLogger($container->get("logger_default"));
        $warehouseProductEventListener->setConfig($fileConfig);
        $warehouseProductEventListener->setWarehouseProductHydrator($warehouseProductHydrator);
        return $warehouseProductEventListener;
    }
}
