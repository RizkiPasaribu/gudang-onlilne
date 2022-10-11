<?php

namespace GudangOnline\V1;

use Zend\EventManager\Event;
use Zend\InputFilter\InputFilterInterface;
use \Exception;

class WarehouseEvent extends Event
{
    const EVENT_CREATE_WAREHOUSE           = 'create.warehouse';
    const EVENT_CREATE_WAREHOUSE_SUCCESS   = 'create.warehouse.success';
    const EVENT_CREATE_WAREHOUSE_ERROR     = 'create.warehouse.error';

    const EVENT_EDIT_WAREHOUSE           = 'edit.warehouse';
    const EVENT_EDIT_WAREHOUSE_SUCCESS   = 'edit.warehouse.success';
    const EVENT_EDIT_WAREHOUSE_ERROR     = 'edit.warehouse.error';

    const EVENT_DELETE_WAREHOUSE           = 'delete.warehouse';
    const EVENT_DELETE_WAREHOUSE_SUCCESS   = 'delete.warehouse.success';
    const EVENT_DELETE_WAREHOUSE_ERROR     = 'delete.warehouse.error';

    /**#@-*/
    /**
     * @var GudangOnline\Entity\Warehouse
     */
    protected $warehouseEntity;

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

    protected $optionFields;


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
     * Get the value of warehouseEntity
     *
     * @return  \GudangOnline\Entity\Warehouse
     */
    public function getWarehouseEntity()
    {
        return $this->warehouseEntity;
    }

    /**
     * Set the value of warehouseEntity
     *
     * @param  \GudangOnline\Entity\Warehouse  $warehouseEntity
     *
     * @return  self
     */
    public function setWarehouseEntity(\GudangOnline\Entity\Warehouse $warehouseEntity)
    {
        $this->warehouseEntity = $warehouseEntity;
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

    public function getOptionFields()
    {
        return $this->optionFields;
    }

    public function setOptionFields(array $optionFields)
    {
        $this->optionFields = $optionFields;

        return $this;
    }
}
