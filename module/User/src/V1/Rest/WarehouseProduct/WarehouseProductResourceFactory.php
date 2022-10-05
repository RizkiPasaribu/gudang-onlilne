<?php
namespace User\V1\Rest\WarehouseProduct;

class WarehouseProductResourceFactory
{
    public function __invoke($services)
    {
        return new WarehouseProductResource();
    }
}
