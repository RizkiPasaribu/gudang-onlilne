<?php

namespace GudangOnline\V1\Rpc\StockIn;

class StockInControllerFactory
{
    public function __invoke($controllers)
    {
        $warehouseProductMapper   = $controllers->get(\GudangOnline\Mapper\WarehouseProduct::class);
        $warehouseProductService  = $controllers->get(\GudangOnline\V1\Service\WarehouseProduct::class);
        $userAccessMapper   = $controllers->get(\User\Mapper\UserAccess::class);

        $authentication = $controllers->get('authentication');
        $username    = $authentication->getIdentity()->getAuthenticationIdentity()['user_id'];
        $userProfile = $controllers->get('User\Mapper\UserProfile')->fetchOneBy(['username' => $username]);

        $warehouseProductResource = new StockInController($warehouseProductMapper, $userProfile, $warehouseProductService, $userAccessMapper);
        return $warehouseProductResource;
    }
}
