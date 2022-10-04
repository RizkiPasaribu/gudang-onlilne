<?php

namespace GudangOnline\V1\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ProductCategoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config')['product_category'];
        $productService = new ProductCategory();
        $productService->setConfig($config);
        return $productService;
    }
}
