<?php

namespace GudangOnline\V1\Service\Listener;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class WarehouseEventListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $fileConfig  = $container->get('Config')['warehouse']['files'];
        $warehouseMapper = $container->get(\GudangOnline\Mapper\Warehouse::class);
        $productMapper = $container->get(\GudangOnline\Mapper\Product::class);
        $warehouseProductMapper = $container->get(\GudangOnline\Mapper\WarehouseProduct::class);
        $warehouseHydrator = $container->get('HydratorManager')->get('GudangOnline\Hydrator\Warehouse');
        $warehouseEventListener = new WarehouseEventListener(
            $warehouseMapper,
            $productMapper,
            $warehouseProductMapper
        );
        $warehouseEventListener->setLogger($container->get("logger_default"));
        $warehouseEventListener->setConfig($fileConfig);
        $warehouseEventListener->setWarehouseHydrator($warehouseHydrator);
        return $warehouseEventListener;
    }
}
