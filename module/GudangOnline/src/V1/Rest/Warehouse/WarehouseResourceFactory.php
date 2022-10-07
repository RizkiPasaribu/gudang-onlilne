<?php

namespace GudangOnline\V1\Rest\Warehouse;

class WarehouseResourceFactory
{
    public function __invoke($services)
    {
        $userProfileMapper = $services->get('User\Mapper\UserProfile');
        $warehouseMapper   = $services->get(\GudangOnline\Mapper\Warehouse::class);
        $warehouseService  = $services->get(\GudangOnline\V1\Service\Warehouse::class);
        $warehouseResource = new WarehouseResource(
            $userProfileMapper,
            $warehouseMapper,
            $warehouseService
        );
        return $warehouseResource;
    }
}
