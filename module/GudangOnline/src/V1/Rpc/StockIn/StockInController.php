<?php

namespace GudangOnline\V1\Rpc\StockIn;

use Zend\Mvc\Controller\AbstractActionController;
use ZF\ApiProblem\ApiProblem;
use ZF\ApiProblem\ApiProblemResponse;

class StockInController extends AbstractActionController
{
    protected $warehouseProductMapper;
    protected $userProfile;
    protected $warehouseProductService;
    protected $userAccessMapper;

    public function __construct($warehouseProductMapper, $userProfile, $warehouseProductService, $userAccessMapper)
    {
        $this->warehouseProductMapper = $warehouseProductMapper;
        $this->userProfile = $userProfile;
        $this->warehouseProductService = $warehouseProductService;
        $this->userAccessMapper = $userAccessMapper;
    }
    public function stockInAction()
    {
        $userProfile = $this->userProfile;
        if ($userProfile === null) {
            return new ApiProblemResponse(new ApiProblem(403, "You do not have access!"));
        }

        $userProfileUuid = $userProfile->getUuid();
        $queryParamUserAccess = [
            'userProfile' => $userProfileUuid
        ];
        $userAccess = $this->userAccessMapper->fetchOneBy($queryParamUserAccess);
        //initiate var role, create condition to check if userAccess isExist 
        $role = '';
        if (!is_null($userAccess)) {
            $role = strtolower($userAccess->getUserRole()->getName());
        }

        if ($role !== \User\V1\Role::ADMIN) {
            return new ApiProblemResponse(new ApiProblem(403, "You do not have access!"));
        }

        try {
            $event  = $this->getEvent();
            $inputFilter = $event->getParam('ZF\ContentValidation\InputFilter');
            $id = $inputFilter->getValues()['id'];
            $warehouseProduct = $this->warehouseProductMapper->fetchOneBy(['uuid' => $id]);
            $this->warehouseProductService->editWarehouseProduct($warehouseProduct, $inputFilter);
            return new ApiProblemResponse(new ApiProblem(200, "Succes Stockin Product", Null, "Succes"));
        } catch (\RuntimeException $e) {
            return new ApiProblem(500, 'Cannot Stockin Product');
        }
    }
}
