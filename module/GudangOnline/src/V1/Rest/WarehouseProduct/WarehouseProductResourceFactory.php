<?php

namespace GudangOnline\V1\Rest\WarehouseProduct;

class WarehouseProductResourceFactory
{
    public function __invoke($services)
    {
        $userProfileMapper = $services->get('User\Mapper\UserProfile');
        $warehouseProductMapper   = $services->get(\GudangOnline\Mapper\WarehouseProduct::class);
        $warehouseProductService  = $services->get(\GudangOnline\V1\Service\WarehouseProduct::class);
        $warehouseProductResource = new WarehouseProductResource(
            $userProfileMapper,
            $warehouseProductMapper,
            $warehouseProductService
        );
        return $warehouseProductResource;
    }
}
