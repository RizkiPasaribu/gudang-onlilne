<?php

namespace GudangOnline\V1\Service\Listener;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ProductCategoryEventListenerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $fileConfig  = $container->get('Config')['product_category']['files'];
        $productMapper = $container->get(\GudangOnline\Mapper\ProductCategory::class);
        $productHydrator = $container->get('HydratorManager')->get('GudangOnline\Hydrator\ProductCategory');
        $productEventListener = new ProductCategoryEventListener(
            $productMapper
        );
        $productEventListener->setLogger($container->get("logger_default"));
        $productEventListener->setConfig($fileConfig);
        $productEventListener->setProductCategoryHydrator($productHydrator);
        return $productEventListener;
    }
}
