<?php

namespace GudangOnline\V1\Rest\ProductCategory;

class ProductCategoryResourceFactory
{
    public function __invoke($services)
    {
        $userProfileMapper = $services->get('User\Mapper\UserProfile');
        $productCategoryMapper   = $services->get(\GudangOnline\Mapper\ProductCategory::class);
        $productCategoryService  = $services->get(\GudangOnline\V1\Service\ProductCategory::class);
        $productCategoryResource = new ProductCategoryResource(
            $userProfileMapper,
            $productCategoryMapper,
            $productCategoryService
        );
        return $productCategoryResource;
    }
}
