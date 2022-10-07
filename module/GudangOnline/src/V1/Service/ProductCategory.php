<?php

namespace GudangOnline\V1\Service;

use GudangOnline\Entity\ProductCategory as ProductCategoryEntity;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use GudangOnline\V1\ProductCategoryEvent;

class ProductCategory
{
    use EventManagerAwareTrait;

    protected $productEvent;

    protected $config;

    public function addProductCategory(ZendInputFilter $inputFilter)
    {
        $productEvent = new ProductCategoryEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setName(ProductCategoryEvent::EVENT_CREATE_PRODUCT_CATEGORY);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductCategoryEvent::EVENT_CREATE_PRODUCT_CATEGORY_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductCategoryEvent::EVENT_CREATE_PRODUCT_CATEGORY_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getProductCategoryEntity();
        }
    }

    public function editProductCategory($product, ZendInputFilter $inputFilter)
    {
        $productEvent = new ProductCategoryEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setProductCategoryEntity($product);
        $productEvent->setName(ProductCategoryEvent::EVENT_EDIT_PRODUCT_CATEGORY);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductCategoryEvent::EVENT_EDIT_PRODUCT_CATEGORY_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductCategoryEvent::EVENT_EDIT_PRODUCT_CATEGORY_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getProductCategoryEntity();
        }
    }

    public function deleteProductCategory(ProductCategoryEntity $deletedData)
    {
        $productEvent = new ProductCategoryEvent();
        $productEvent->setDeleteData($deletedData);
        $productEvent->setName(ProductCategoryEvent::EVENT_DELETE_PRODUCT_CATEGORY);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductCategoryEvent::EVENT_DELETE_PRODUCT_CATEGORY_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductCategoryEvent::EVENT_DELETE_PRODUCT_CATEGORY_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return true;
        }
    }

    public function getProductCategoryEvent()
    {
        if ($this->productEvent == null) {
            $this->productEvent = new ProductCategoryEvent();
        }

        return $this->productEvent;
    }

    public function setProductCategoryEvent(ProductCategoryEvent $productEvent)
    {
        $this->productEvent = $productEvent;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     *
     * @return self
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }
}
