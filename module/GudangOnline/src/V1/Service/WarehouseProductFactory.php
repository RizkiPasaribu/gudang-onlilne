<?php

namespace GudangOnline\V1\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class WarehouseProductFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config')['warehouse_product'];
        $productService = new WarehouseProduct();
        $productService->setConfig($config);
        return $productService;
    }
}
