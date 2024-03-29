<?php
return [
    'controllers' => [
        'factories' => [
            'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => \GudangOnline\V1\Rpc\StockIn\StockInControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            \GudangOnline\V1\Rest\Product\ProductResource::class => \GudangOnline\V1\Rest\Product\ProductResourceFactory::class,
            \GudangOnline\V1\Rest\ProductCategory\ProductCategoryResource::class => \GudangOnline\V1\Rest\ProductCategory\ProductCategoryResourceFactory::class,
            \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductResource::class => \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductResourceFactory::class,
            \GudangOnline\V1\Rest\Warehouse\WarehouseResource::class => \GudangOnline\V1\Rest\Warehouse\WarehouseResourceFactory::class,
            \GudangOnline\V1\Service\Product::class => \GudangOnline\V1\Service\ProductFactory::class,
            \GudangOnline\V1\Service\Listener\ProductEventListener::class => \GudangOnline\V1\Service\Listener\ProductEventListenerFactory::class,
            \GudangOnline\V1\Service\ProductCategory::class => \GudangOnline\V1\Service\ProductCategoryFactory::class,
            \GudangOnline\V1\Service\Listener\ProductCategoryEventListener::class => \GudangOnline\V1\Service\Listener\ProductCategoryEventListenerFactory::class,
            \GudangOnline\V1\Service\WarehouseProduct::class => \GudangOnline\V1\Service\WarehouseProductFactory::class,
            \GudangOnline\V1\Service\Listener\WarehouseProductEventListener::class => \GudangOnline\V1\Service\Listener\WarehouseProductEventListenerFactory::class,
            \GudangOnline\V1\Service\Warehouse::class => \GudangOnline\V1\Service\WarehouseFactory::class,
            \GudangOnline\V1\Service\Listener\WarehouseEventListener::class => \GudangOnline\V1\Service\Listener\WarehouseEventListenerFactory::class,
        ],
        'abstract_factories' => [
            0 => \GudangOnline\Mapper\AbstractMapperFactory::class,
        ],
    ],
    'hydrators' => [
        'factories' => [
            'GudangOnline\\Hydrator\\Product' => \GudangOnline\V1\Hydrator\ProductHydratorFactory::class,
            'GudangOnline\\Hydrator\\ProductCategory' => \GudangOnline\V1\Hydrator\ProductCategoryHydratorFactory::class,
            'GudangOnline\\Hydrator\\WarehouseProduct' => \GudangOnline\V1\Hydrator\WarehouseProductHydratorFactory::class,
            'GudangOnline\\Hydrator\\Warehouse' => \GudangOnline\V1\Hydrator\WarehouseHydratorFactory::class,
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
            'gudang-online.rest.warehouse-product' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/warehouse-product[/:uuid]',
                    'defaults' => [
                        'controller' => 'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller',
                    ],
                ],
            ],
            'gudang-online.rest.warehouse' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/warehouse[/:uuid]',
                    'defaults' => [
                        'controller' => 'GudangOnline\\V1\\Rest\\Warehouse\\Controller',
                    ],
                ],
            ],
            'gudang-online.rpc.stock-in' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/stockin',
                    'defaults' => [
                        'controller' => 'GudangOnline\\V1\\Rpc\\StockIn\\Controller',
                        'action' => 'stockIn',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'gudang-online.rest.product',
            1 => 'gudang-online.rest.product-category',
            2 => 'gudang-online.rest.warehouse-product',
            3 => 'gudang-online.rest.warehouse',
            4 => 'gudang-online.rpc.stock-in',
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
            'collection_query_whitelist' => [
                0 => 'name',
            ],
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
        'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => [
            'listener' => \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductResource::class,
            'route_name' => 'gudang-online.rest.warehouse-product',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'warehouse_product',
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
            'entity_class' => \GudangOnline\Entity\WarehouseProduct::class,
            'collection_class' => \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductCollection::class,
            'service_name' => 'WarehouseProduct',
        ],
        'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => [
            'listener' => \GudangOnline\V1\Rest\Warehouse\WarehouseResource::class,
            'route_name' => 'gudang-online.rest.warehouse',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'warehouse',
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
            'entity_class' => \GudangOnline\Entity\Warehouse::class,
            'collection_class' => \GudangOnline\V1\Rest\Warehouse\WarehouseCollection::class,
            'service_name' => 'Warehouse',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => 'HalJson',
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => 'HalJson',
            'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => 'HalJson',
            'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => 'HalJson',
            'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
                3 => 'multipart/form-data',
            ],
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'GudangOnline\\V1\\Rest\\Product\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
            ],
            'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => [
                0 => 'application/vnd.gudang-online.v1+json',
                1 => 'application/json',
            ],
            'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => [
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
            \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.warehouse-product',
                'route_identifier_name' => 'warehouse_product_id',
                'hydrator' => 'GudangOnline\\Hydrator\\WarehouseProduct',
            ],
            \GudangOnline\V1\Rest\WarehouseProduct\WarehouseProductCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.warehouse-product',
                'route_identifier_name' => 'warehouse_product_id',
                'is_collection' => true,
            ],
            \GudangOnline\Entity\WarehouseProduct::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'gudang-online.rest.warehouse-product',
                'route_identifier_name' => 'uuid',
                'hydrator' => 'GudangOnline\\Hydrator\\WarehouseProduct',
            ],
            \GudangOnline\V1\Rest\Warehouse\WarehouseEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.warehouse',
                'route_identifier_name' => 'warehouse_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \GudangOnline\V1\Rest\Warehouse\WarehouseCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'gudang-online.rest.warehouse',
                'route_identifier_name' => 'warehouse_id',
                'is_collection' => true,
            ],
            \GudangOnline\Entity\Warehouse::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'gudang-online.rest.warehouse',
                'route_identifier_name' => 'uuid',
                'hydrator' => 'GudangOnline\\Hydrator\\Warehouse',
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
            'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => [
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
            'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => [
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
            'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => [
                'actions' => [
                    'stockIn' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'GudangOnline\\V1\\Rest\\ProductCategory\\Controller' => [
            'input_filter' => 'GudangOnline\\V1\\Rest\\ProductCategory\\Validator',
        ],
        'GudangOnline\\V1\\Rest\\Product\\Controller' => [
            'input_filter' => 'GudangOnline\\V1\\Rest\\Product\\Validator',
        ],
        'GudangOnline\\V1\\Rest\\Warehouse\\Controller' => [
            'input_filter' => 'GudangOnline\\V1\\Rest\\Warehouse\\Validator',
        ],
        'GudangOnline\\V1\\Rest\\WarehouseProduct\\Controller' => [
            'input_filter' => 'GudangOnline\\V1\\Rest\\WarehouseProduct\\Validator',
        ],
        'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => [
            'input_filter' => 'GudangOnline\\V1\\Rpc\\StockIn\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'GudangOnline\\V1\\Rest\\ProductCategory\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
        ],
        'GudangOnline\\V1\\Rest\\Product\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'price',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\File\RenameUpload::class,
                        'options' => [
                            'randomize' => true,
                            'target' => 'data/photo',
                            'use_upload_extension' => true,
                        ],
                    ],
                ],
                'name' => 'photo',
            ],
            3 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'productCategory',
            ],
        ],
        'GudangOnline\\V1\\Rest\\Warehouse\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'code',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'type',
            ],
            3 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'products',
            ],
        ],
        'GudangOnline\\V1\\Rest\\WarehouseProduct\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'stock',
                'description' => 'for item stock',
                'field_type' => 'Integer',
                'allow_empty' => true,
                'error_message' => 'Field stock must be Integer',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'product',
                'field_type' => 'String',
                'error_message' => 'Required',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'warehouse',
                'field_type' => 'String',
                'error_message' => 'Required',
            ],
        ],
        'GudangOnline\\V1\\Rpc\\StockIn\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'stock',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
            ],
        ],
    ],
    'zf-rpc' => [
        'GudangOnline\\V1\\Rpc\\StockIn\\Controller' => [
            'service_name' => 'StockIn',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'gudang-online.rpc.stock-in',
        ],
    ],
];
