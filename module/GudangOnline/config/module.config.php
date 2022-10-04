<?php
return [
    'service_manager' => [
        'factories' => [
            \GudangOnline\V1\Rest\Product\ProductResource::class => \GudangOnline\V1\Rest\Product\ProductResourceFactory::class,
            \GudangOnline\V1\Rest\ProductCategory\ProductCategoryResource::class => \GudangOnline\V1\Rest\ProductCategory\ProductCategoryResourceFactory::class,
            \GudangOnline\V1\Service\Product::class => \GudangOnline\V1\Service\ProductFactory::class,
            \GudangOnline\V1\Service\Listener\ProductEventListener::class => \GudangOnline\V1\Service\Listener\ProductEventListenerFactory::class,
            \GudangOnline\V1\Service\ProductCategory::class => \GudangOnline\V1\Service\ProductCategoryFactory::class,
            \GudangOnline\V1\Service\Listener\ProductCategoryEventListener::class => \GudangOnline\V1\Service\Listener\ProductCategoryEventListenerFactory::class,
        ],
        'abstract_factories' => [
            0 => \GudangOnline\Mapper\AbstractMapperFactory::class,
        ],
    ],
    'hydrators' => [
        'factories' => [
            'GudangOnline\\Hydrator\\Product' => \GudangOnline\V1\Hydrator\ProductHydratorFactory::class,
            'GudangOnline\\Hydrator\\ProductCategory' => \GudangOnline\V1\Hydrator\ProductCategoryHydratorFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'gudang-online.rest.product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/product[/:uuid]',
                    'defaults' => [
                        'controller' => 'GudangOnline\\V1\\Rest\\Product\\Controller',
                    ],
                ],
            ],
            'gudang-online.rest.product-category' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/product-category[/:uuid]',
                    'defaults' => [
                        'controller' => 'GudangOnline\\V1\\Rest\\ProductCategory\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'gudang-online.rest.product',
            1 => 'gudang-online.rest.product-category',
        ],
    ],
    'zf-rest' => [
        'GudangOnline\\V1\\Rest\\Product\\Controller' => [
            'listener' => \GudangOnline\V1\Rest\Product\ProductResource::class,
            'route_name' => 'gudang-online.rest.product',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'product',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \GudangOnline\Entity\Product::class,
            'collection_class' => \GudangOnline\V1\Rest\Product\ProductCollection::class,
            'service_name' => 'Product',
        ],
        'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
            'listener' => \GudangOnline\V1\Rest\ProductCategory\ProductCategoryResource::class,
            'route_name' => 'gudang-online.rest.product-category',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'product_category',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \GudangOnline\Entity\ProductCategory::class,
            'collection_class' => \GudangOnline\V1\Rest\ProductCategory\ProductCategoryCollection::class,
            'service_name' => 'ProductCategory',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => 'HalJson',
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \GudangOnline\V1\Rest\Product\ProductEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.product',
                'route_identifier_name' => 'product_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \GudangOnline\V1\Rest\Product\ProductCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.product',
                'route_identifier_name' => 'product_id',
                'is_collection' => true,
            ],
            \GudangOnline\Entity\Product::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'gudang-online.rest.product',
                'route_identifier_name' => 'uuid',
                'hydrator' => 'GudangOnline\\Hydrator\\Product',
            ],
            \GudangOnline\V1\Rest\ProductCategory\ProductCategoryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.product-category',
                'route_identifier_name' => 'product_category_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \GudangOnline\V1\Rest\ProductCategory\ProductCategoryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.product-category',
                'route_identifier_name' => 'product_category_id',
                'is_collection' => true,
            ],
            \GudangOnline\Entity\ProductCategory::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'gudang-online.rest.product-category',
                'route_identifier_name' => 'uuid',
                'hydrator' => 'GudangOnline\\Hydrator\\ProductCategory',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
