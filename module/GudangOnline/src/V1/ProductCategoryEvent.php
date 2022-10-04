<?php

namespace GudangOnline\V1;

use Zend\EventManager\Event;
use Zend\InputFilter\InputFilterInterface;
use \Exception;

class ProductCategoryEvent extends Event
{
    const EVENT_CREATE_PRODUCT_CATEGORY           = 'create.productCategory';
    const EVENT_CREATE_PRODUCT_CATEGORY_SUCCESS   = 'create.productCategory.success';
    const EVENT_CREATE_PRODUCT_CATEGORY_ERROR     = 'create.productCategory.error';

    const EVENT_EDIT_PRODUCT_CATEGORY           = 'edit.productCategory';
    const EVENT_EDIT_PRODUCT_CATEGORY_SUCCESS   = 'edit.productCategory.success';
    const EVENT_EDIT_PRODUCT_CATEGORY_ERROR     = 'edit.productCategory.error';

    const EVENT_DELETE_PRODUCT_CATEGORY           = 'delete.productCategory';
    const EVENT_DELETE_PRODUCT_CATEGORY_SUCCESS   = 'delete.productCategory.success';
    const EVENT_DELETE_PRODUCT_CATEGORY_ERROR     = 'delete.productCategory.error';

    /**#@-*/
    /**
     * @var Kelas\Entity\Kelas
     */
    protected $productCategoryEntity;

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
     * Get the value of productCategoryEntity
     *
     * @return  Kelas\Entity\Kelas
     */
    public function getProductCategoryEntity()
    {
        return $this->productCategoryEntity;
    }

    /**
     * Set the value of productCategoryEntity
     *
     * @param  Kelas\Entity\Kelas  $productCategoryEntity
     *
     * @return  self
     */
    public function setProductCategoryEntity(\GudangOnline\Entity\ProductCategory $productCategoryEntity)
    {
        $this->productCategoryEntity = $productCategoryEntity;

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
