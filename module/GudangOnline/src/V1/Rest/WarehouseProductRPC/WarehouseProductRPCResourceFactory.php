<?php
namespace GudangOnline\V1\Rest\WarehouseProductRPC;

class WarehouseProductRPCResourceFactory
{
    public function __invoke($services)
    {
        return new WarehouseProductRPCResource();
    }
}
