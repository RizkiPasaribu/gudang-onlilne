<?php

namespace GudangOnline\V1\Service;

use GudangOnline\Entity\Product as ProductEntity;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use GudangOnline\V1\ProductEvent;

class Product
{
    use EventManagerAwareTrait;

    protected $productEvent;

    protected $config;

    public function addProduct(ZendInputFilter $inputFilter)
    {
        $productEvent = new ProductEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setName(ProductEvent::EVENT_CREATE_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductEvent::EVENT_CREATE_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductEvent::EVENT_CREATE_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getProductEntity();
        }
    }

    public function editProduct($product, ZendInputFilter $inputFilter)
    {
        $productEvent = new ProductEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setProductEntity($product);
        $productEvent->setName(ProductEvent::EVENT_EDIT_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductEvent::EVENT_EDIT_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductEvent::EVENT_EDIT_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getProductEntity();
        }
    }

    public function deleteProduct(ProductEntity $deletedData)
    {
        $productEvent = new ProductEvent();
        $productEvent->setDeleteData($deletedData);
        $productEvent->setName(ProductEvent::EVENT_DELETE_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(ProductEvent::EVENT_DELETE_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(ProductEvent::EVENT_DELETE_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return true;
        }
    }

    public function getProductEvent()
    {
        if ($this->productEvent == null) {
            $this->productEvent = new ProductEvent();
        }

        return $this->productEvent;
    }

    public function setProductEvent(ProductEvent $productEvent)
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
