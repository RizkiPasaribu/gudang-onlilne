<?php

namespace GudangOnline\V1;

use Zend\EventManager\Event;
use Zend\InputFilter\InputFilterInterface;
use \Exception;

class WarehouseProductEvent extends Event
{
    const EVENT_CREATE_WAREHOUSE_PRODUCT           = 'create.warehouseProduct';
    const EVENT_CREATE_WAREHOUSE_PRODUCT_SUCCESS   = 'create.warehouseProduct.success';
    const EVENT_CREATE_WAREHOUSE_PRODUCT_ERROR     = 'create.warehouseProduct.error';

    const EVENT_EDIT_WAREHOUSE_PRODUCT           = 'edit.warehouseProduct';
    const EVENT_EDIT_WAREHOUSE_PRODUCT_SUCCESS   = 'edit.warehouseProduct.success';
    const EVENT_EDIT_WAREHOUSE_PRODUCT_ERROR     = 'edit.warehouseProduct.error';

    const EVENT_DELETE_WAREHOUSE_PRODUCT           = 'delete.warehouseProduct';
    const EVENT_DELETE_WAREHOUSE_PRODUCT_SUCCESS   = 'delete.warehouseProduct.success';
    const EVENT_DELETE_WAREHOUSE_PRODUCT_ERROR     = 'delete.warehouseProduct.error';

    /**#@-*/
    /**
     * @var GudangOnline\Entity\WarehouseProduct
     */
    protected $warehouseProductEntity;

    /**
     * @var Zend\InputFilter\InputFilterInterface
     */
    protected $inputFilter;

    /**
     * @var \Exception
     */
    protected $exception;

    protected $deleteData;

    protected $bodyResponse;

    protected $updateData;


    /**
     * @return the $inputFilter
     */
    public function getInputFilter()
    {
        return $this->inputFilter;
    }

    /**
     * @param Zend\InputFilter\InputFilterInterface $inputFilter
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }

    /**
     * @return the $exception
     */
    public function getException()
    {
        return $this->exception;
    }

    /**
     * @param Exception $exception
     */
    public function setException(Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Get the value of bodyResponse
     */
    public function getBodyResponse()
    {
        return $this->bodyResponse;
    }

    /**
     * Set the value of bodyResponse
     *
     * @return  self
     */
    public function setBodyResponse($bodyResponse)
    {
        $this->bodyResponse = $bodyResponse;

        return $this;
    }

    /**
     * Get the value of deleteData
     */
    public function getDeleteData()
    {
        return $this->deleteData;
    }

    /**
     * Set the value of deleteData
     *
     * @return  self
     */
    public function setDeleteData($deleteData)
    {
        $this->deleteData = $deleteData;

        return $this;
    }

    /**
     * Get the value of warehouseProductEntity
     *
     * @return  GudangOnline\Entity\WarehouseProduct
     */
    public function getWarehouseProductEntity()
    {
        return $this->warehouseProductEntity;
    }

    /**
     * Set the value of warehouseProductEntity
     *
     * @param  GudangOnline\Entity\WarehouseProduct  $warehouseProductEntity
     *
     * @return  self
     */
    public function setWarehouseProductEntity(\GudangOnline\Entity\WarehouseProduct $warehouseProductEntity)
    {
        $this->warehouseProductEntity = $warehouseProductEntity;
        return $this;
    }

    public function getUpdateData()
    {
        return $this->updateData;
    }

    public function setUpdateData($updateData)
    {
        $this->updateData = $updateData;
    }
}
