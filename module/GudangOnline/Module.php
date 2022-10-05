<?php

namespace GudangOnline;

use Zend\Mvc\MvcEvent;
use ZF\Apigility\Provider\ApigilityProviderInterface;

class Module implements ApigilityProviderInterface
{
    public function onBootstrap(MvcEvent $mvcEvent)
    {
        $sm = $mvcEvent->getApplication()->getServiceManager();
        // product
        $productService = $sm->get(\GudangOnline\V1\Service\Product::class);
        $productEventListener = $sm->get(\GudangOnline\V1\Service\Listener\ProductEventListener::class);
        $productEventListener->attach($productService->getEventManager());

        // product category
        $productCategoryService = $sm->get(\GudangOnline\V1\Service\ProductCategory::class);
        $productCategoryEventListener = $sm->get(\GudangOnline\V1\Service\Listener\ProductCategoryEventListener::class);
        $productCategoryEventListener->attach($productCategoryService->getEventManager());

        // warehouse product
        $warehouseProductService = $sm->get(\GudangOnline\V1\Service\WarehouseProduct::class);
        $warehouseProductEventListener = $sm->get(\GudangOnline\V1\Service\Listener\WarehouseProductEventListener::class);
        $warehouseProductEventListener->attach($warehouseProductService->getEventManager());
    }

    public function getConfig()
    {
        $config = [];
        $configFiles = [
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/doctrine.config.php',  // configuration for doctrine
        ];

        // merge all module config options
        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile, true);
        }

        return $config;
    }

    public function getAutoloaderConfig()
    {
        return [
            'ZF\Apigility\Autoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
