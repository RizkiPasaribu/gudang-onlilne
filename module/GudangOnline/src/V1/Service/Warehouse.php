<?php

namespace GudangOnline\V1\Service;

use GudangOnline\Entity\Warehouse as WarehouseEntity;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\InputFilter\InputFilter as ZendInputFilter;
use GudangOnline\V1\WarehouseEvent;

class Warehouse
{
    use EventManagerAwareTrait;

    protected $warehouseEvent;

    protected $config;

    public function addWarehouse(ZendInputFilter $inputFilter)
    {
        $warehouseEvent = new WarehouseEvent();
        $warehouseEvent->setInputFilter($inputFilter);
        $warehouseEvent->setName(WarehouseEvent::EVENT_CREATE_WAREHOUSE);
        $create = $this->getEventManager()->triggerEvent($warehouseEvent);
        if ($create->stopped()) {
            $warehouseEvent->setName(WarehouseEvent::EVENT_CREATE_WAREHOUSE_ERROR);
            $warehouseEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($warehouseEvent);
            throw $warehouseEvent->getException();
        } else {
            $warehouseEvent->setName(WarehouseEvent::EVENT_CREATE_WAREHOUSE_SUCCESS);
            $this->getEventManager()->triggerEvent($warehouseEvent);
            return $warehouseEvent->getWarehouseEntity();
        }
    }

    public function editWarehouse($warehouse, ZendInputFilter $inputFilter)
    {
        $warehouseEvent = new WarehouseEvent();
        $warehouseEvent->setInputFilter($inputFilter);
        $warehouseEvent->setWarehouseEntity($warehouse);
        $warehouseEvent->setName(WarehouseEvent::EVENT_EDIT_WAREHOUSE);
        $create = $this->getEventManager()->triggerEvent($warehouseEvent);
        if ($create->stopped()) {
            $warehouseEvent->setName(WarehouseEvent::EVENT_EDIT_WAREHOUSE_ERROR);
            $warehouseEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($warehouseEvent);
            throw $warehouseEvent->getException();
        } else {
            $warehouseEvent->setName(WarehouseEvent::EVENT_EDIT_WAREHOUSE_SUCCESS);
            $this->getEventManager()->triggerEvent($warehouseEvent);
            return $warehouseEvent->getWarehouseEntity();
        }
    }

    public function deleteWarehouse(WarehouseEntity $deletedData)
    {
        $warehouseEvent = new WarehouseEvent();
        $warehouseEvent->setDeleteData($deletedData);
        $warehouseEvent->setName(WarehouseEvent::EVENT_DELETE_WAREHOUSE);
        $create = $this->getEventManager()->triggerEvent($warehouseEvent);
        if ($create->stopped()) {
            $warehouseEvent->setName(WarehouseEvent::EVENT_DELETE_WAREHOUSE_ERROR);
            $warehouseEvent->setException($create->last());
            $this->getEventManager()->triggerEvent($warehouseEvent);
            throw $warehouseEvent->getException();
        } else {
            $warehouseEvent->setName(WarehouseEvent::EVENT_DELETE_WAREHOUSE_SUCCESS);
            $this->getEventManager()->triggerEvent($warehouseEvent);
            return true;
        }
    }

    public function getWarehouseEvent()
    {
        if ($this->warehouseEvent == null) {
            $this->warehouseEvent = new WarehouseEvent();
        }

        return $this->warehouseEvent;
    }

    public function setWarehouseEvent(WarehouseEvent $warehouseEvent)
    {
        $this->warehouseEvent = $warehouseEvent;
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
