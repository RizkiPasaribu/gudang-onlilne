<?php

namespace GudangOnline\V1\Service\Listener;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ProductEventListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $fileConfig  = $container->get('Config')['product']['files'];
        $productMapper = $container->get(\GudangOnline\Mapper\Product::class);
        $productHydrator = $container->get('HydratorManager')->get('GudangOnline\Hydrator\Product');
        $productEventListener = new ProductEventListener(
            $productMapper
        );
        $productEventListener->setLogger($container->get("logger_default"));
        $productEventListener->setConfig($fileConfig);
        $productEventListener->setProductHydrator($productHydrator);
        return $productEventListener;
    }
}
