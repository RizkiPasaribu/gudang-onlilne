<?php

namespace GudangOnline\V1\Service;

use GudangOnline\Entity\WarehouseProduct as WarehouseProductEntity;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use GudangOnline\V1\WarehouseProductEvent;

class WarehouseProduct
{
    use EventManagerAwareTrait;

    protected $productEvent;

    protected $config;

    public function addWarehouseProduct(ZendInputFilter $inputFilter)
    {
        $productEvent = new WarehouseProductEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setName(WarehouseProductEvent::EVENT_CREATE_WAREHOUSE_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(WarehouseProductEvent::EVENT_CREATE_WAREHOUSE_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(WarehouseProductEvent::EVENT_CREATE_WAREHOUSE_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getWarehouseProductEntity();
        }
    }

    public function editWarehouseProduct($product, ZendInputFilter $inputFilter)
    {
        $productEvent = new WarehouseProductEvent();
        $productEvent->setInputFilter($inputFilter);
        $productEvent->setWarehouseProductEntity($product);
        $productEvent->setName(WarehouseProductEvent::EVENT_EDIT_WAREHOUSE_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(WarehouseProductEvent::EVENT_EDIT_WAREHOUSE_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(WarehouseProductEvent::EVENT_EDIT_WAREHOUSE_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return $productEvent->getWarehouseProductEntity();
        }
    }

    public function deleteWarehouseProduct(WarehouseProductEntity $deletedData)
    {
        $productEvent = new WarehouseProductEvent();
        $productEvent->setDeleteData($deletedData);
        $productEvent->setName(WarehouseProductEvent::EVENT_DELETE_WAREHOUSE_PRODUCT);
        $create = $this->getEventManager()->triggerEvent($productEvent);
        if ($create->stopped()) {
            $productEvent->setName(WarehouseProductEvent::EVENT_DELETE_WAREHOUSE_PRODUCT_ERROR);
            $productEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($productEvent);
            throw $productEvent->getException();
        } else {
            $productEvent->setName(WarehouseProductEvent::EVENT_DELETE_WAREHOUSE_PRODUCT_SUCCESS);
            $this->getEventManager()->triggerEvent($productEvent);
            return true;
        }
    }

    public function getWarehouseProductEvent()
    {
        if ($this->productEvent == null) {
            $this->productEvent = new WarehouseProductEvent();
        }

        return $this->productEvent;
    }

    public function setWarehouseProductEvent(WarehouseProductEvent $productEvent)
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
