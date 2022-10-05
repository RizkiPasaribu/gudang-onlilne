<?php

namespace GudangOnline\V1\Rest\WarehouseProduct;

use User\V1\Rest\AbstractResource;
use Zend\Paginator\Paginator;
use ZF\ApiProblem\ApiProblem;
use ZF\ApiProblem\ApiProblemResponse;

class WarehouseProductResource extends AbstractResource
{
    protected $userProfileMapper;
    protected $warehouseProductMapper;
    protected $warehouseProductService;

    public function __construct(
        $userProfileMapper,
        $warehouseProductMapper,
        $warehouseProductService
    ) {
        $this->userProfileMapper = $userProfileMapper;
        $this->warehouseProductMapper = $warehouseProductMapper;
        $this->warehouseProductService = $warehouseProductService;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $userProfile = $this->fetchUserProfile();
        if (is_null($userProfile)) {
            return new ApiProblemResponse(new ApiProblem(403, "You do not have access!"));
        }

        $inputFilter = $this->getInputFilter();

        try {
            $inputFilter->add(['name' => 'createdAt']);
            $inputFilter->get('createdAt')->setValue(new \DateTime('now'));

            $inputFilter->add(['name' => 'updatedAt']);
            $inputFilter->get('updatedAt')->setValue(new \DateTime('now'));

            $result = $this->warehouseProductService->addWarehouseProduct($inputFilter);
            return $result;
        } catch (\User\V1\Service\Exception\RuntimeException $e) {
            return new ApiProblemResponse(new ApiProblem(500, $e->getMessage()));
        }
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $userProfile = $this->fetchUserProfile();
        if (is_null($userProfile) || is_null($userProfile->getAccount())) {
            return new ApiProblemResponse(new ApiProblem(404, "You do not have access"));
        }

        try {
            $warehouseProduct = $this->warehouseProductMapper->fetchOneBy(['uuid' => $id]);
            if (is_null($warehouseProduct)) {
                return new ApiProblem(404, "Product data Not Found");
            }
            $this->warehouseProductService->deleteWarehouseProduct($warehouseProduct);
            return new ApiProblem(200, "Succes Deleted Warehouse Product With UUID " . $id, null, "Success");
        } catch (\RuntimeException $e) {
            return new ApiProblemResponse(new ApiProblem(500, $e->getMessage()));
        }
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $warehouseProduct = $this->warehouseProductMapper->fetchOne($id);
        if (!$warehouseProduct) return new ApiProblemResponse(new ApiProblem(404, 'School Not Found'));
        return $warehouseProduct;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $userProfile = $this->fetchUserProfile();
        if (is_null($userProfile)) return new ApiProblemResponse(new ApiProblem(401, 'You\'re Not Authorized'));

        $urlParams = [];
        $qb = $this->warehouseProductMapper->fetchAll($urlParams);
        $paginatorAdapter = $this->warehouseProductMapper->createPaginatorAdapter($qb);
        return new Paginator($paginatorAdapter);
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        $warehouseProduct = $this->warehouseProductMapper->fetchOneBy(['uuid' => $id]);
        if (is_null($warehouseProduct)) {
            return new ApiProblemResponse(new ApiProblem(404, "Warehouse Product data not found!"));
        }
        $inputFilter = $this->getInputFilter();
        $this->warehouseProductService->editWarehouseProduct($warehouseProduct, $inputFilter);
        return $warehouseProduct;
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
