<?php
namespace User\V1\Rest\Warehouse;

class WarehouseResourceFactory
{
    public function __invoke($services)
    {
        return new WarehouseResource();
    }
}
