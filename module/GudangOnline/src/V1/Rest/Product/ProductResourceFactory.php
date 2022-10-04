<?php

namespace GudangOnline\V1\Rest\Product;

class ProductResourceFactory
{
    public function __invoke($services)
    {
        $userProfileMapper = $services->get('User\Mapper\UserProfile');
        $productMapper   = $services->get(\GudangOnline\Mapper\Product::class);
        $productService  = $services->get(\GudangOnline\V1\Service\Product::class);
        $productResource = new ProductResource(
            $userProfileMapper,
            $productMapper,
            $productService
        );
        return $productResource;
    }
}
