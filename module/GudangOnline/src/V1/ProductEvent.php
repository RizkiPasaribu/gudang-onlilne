<?php

namespace GudangOnline\V1;

use Zend\EventManager\Event;
use Zend\InputFilter\InputFilterInterface;
use \Exception;

class ProductEvent extends Event
{
    const EVENT_CREATE_PRODUCT           = 'create.product';
    const EVENT_CREATE_PRODUCT_SUCCESS   = 'create.product.success';
    const EVENT_CREATE_PRODUCT_ERROR     = 'create.product.error';

    const EVENT_EDIT_PRODUCT           = 'edit.product';
    const EVENT_EDIT_PRODUCT_SUCCESS   = 'edit.product.success';
    const EVENT_EDIT_PRODUCT_ERROR     = 'edit.product.error';

    const EVENT_DELETE_PRODUCT           = 'delete.product';
    const EVENT_DELETE_PRODUCT_SUCCESS   = 'delete.product.success';
    const EVENT_DELETE_PRODUCT_ERROR     = 'delete.product.error';

    /**#@-*/
    /**
     * @var Kelas\Entity\Kelas
     */
    protected $productEntity;

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
     * Get the value of productEntity
     *
     * @return  Kelas\Entity\Kelas
     */
    public function getProductEntity()
    {
        return $this->productEntity;
    }

    /**
     * Set the value of productEntity
     *
     * @param  Kelas\Entity\Kelas  $productEntity
     *
     * @return  self
     */
    public function setProductEntity(\GudangOnline\Entity\Product $productEntity)
    {
        $this->productEntity = $productEntity;
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
