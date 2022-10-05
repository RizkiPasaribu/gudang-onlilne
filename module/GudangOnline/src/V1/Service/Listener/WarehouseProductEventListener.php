<?php

namespace GudangOnline\V1\Service\Listener;

use GudangOnline\Entity\WarehouseProduct;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Exception\InvalidArgumentException;
use Psr\Log\LoggerAwareTrait;
use GudangOnline\Mapper\WarehouseProductTrait;
use Zend\EventManager\EventManagerAwareTrait;
use GudangOnline\V1\WarehouseProductEvent;
use Zend\Log\Exception\RuntimeException;

class WarehouseProductEventListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use EventManagerAwareTrait;
    use LoggerAwareTrait;
    // use WarehouseProductTrait;

    protected $config;
    protected $warehouseProductEvent;
    protected $warehouseProductHydrator;
    protected $warehouseProductIndicatorHydrator;
    protected $warehouseProductIndicatorAttachmentHydrator;
    protected $fillingTimeRangeHydrator;

    protected $warehouseProductMapper;

    public function __construct(
        $warehouseProductMapper
    ) {
        $this->warehouseProductMapper = $warehouseProductMapper;
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            WarehouseProductEvent::EVENT_CREATE_WAREHOUSE_PRODUCT,
            [$this, 'createWarehouseProduct'],
            500
        );

        $this->listeners[] = $events->attach(
            WarehouseProductEvent::EVENT_EDIT_WAREHOUSE_PRODUCT,
            [$this, 'editWarehouseProduct'],
            500
        );

        $this->listeners[] = $events->attach(
            WarehouseProductEvent::EVENT_DELETE_WAREHOUSE_PRODUCT,
            [$this, 'deleteWarehouseProduct'],
            500
        );
    }

    public function createWarehouseProduct(WarehouseProductEvent $event)
    {
        try {
            if (!$event->getInputFilter() instanceof InputFilterInterface) {
                throw new InvalidArgumentException('Input Filter not set');
            }
            $bodyRequest = $event->getInputFilter()->getValues();
            $warehouseProductEntity = new WarehouseProduct;
            $hydrateEntity  = $this->getWarehouseProductHydrator()->hydrate($bodyRequest, $warehouseProductEntity);
            $entityResult   = $this->warehouseProductMapper->save($hydrateEntity);
            $event->setWarehouseProductEntity($entityResult);
            $uuid = $warehouseProductEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: New WarehouseProduct {uuid} created successfully",
                [
                    "function" => __FUNCTION__,
                    "uuid" => $uuid
                ]
            );
        } catch (RuntimeException $e) {
            $event->stopPropagation(true);
            $this->logger->log(
                \Psr\Log\LogLevel::ERROR,
                "{function} : Something Error! \nError_message: {message}",
                [
                    "message" => $e->getMessage(),
                    "function" => __FUNCTION__
                ]
            );
            return $e;
        }
    }

    public function editWarehouseProduct(WarehouseProductEvent $event)
    {
        try {
            $inputFilter = $event->getInputFilter();
            if (!$inputFilter instanceof InputFilterInterface)
                throw new InvalidArgumentException('InputFilter not set');

            $bodyRequest = $inputFilter->getValues();

            $entity = $event->getWarehouseProductEntity();

            $entity->setUpdatedAt(new \DateTime('now'));
            $hydratedEntity = $this->warehouseProductHydrator->hydrate($bodyRequest, $entity);

            if (!($hydratedEntity instanceof WarehouseProduct))
                throw new \Exception('HyratedEntity is not instance of WarehouseProduct Entity');

            $resultEntity  = $this->warehouseProductMapper->save($hydratedEntity);

            if (!($resultEntity instanceof WarehouseProduct))
                throw new \Exception("ResultEntity is not instance of WarehouseProduct Entity");
            $event->setWarehouseProductEntity($resultEntity);
            $uuid = $resultEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: WarehouseProduct {uuid} updated successfully",
                [
                    "function" => __FUNCTION__,
                    "uuid" => $uuid
                ]
            );
        } catch (\Exception $ex) {
            $event->stopPropagation(true);
            $this->logger->log(
                \Psr\Log\LogLevel::ERROR,
                "{function} : Something Error! \nError_message: {message}",
                [
                    "message" => $ex->getMessage(),
                    "function" => __FUNCTION__
                ]
            );
        }
    }

    public function deleteWarehouseProduct(WarehouseProductEvent $event)
    {
        try {
            $deletedData = $event->getDeleteData();
            $this->warehouseProductMapper->delete($deletedData);
            $uuid   = $deletedData->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function} {uuid}: Data WarehouseProduct deleted successfully",
                [
                    'uuid' => $uuid,
                    "function" => __FUNCTION__
                ]
            );
        } catch (\Exception $e) {
            $this->logger->log(\Psr\Log\LogLevel::ERROR, "{function} : Something Error! \nError_message: " . $e->getMessage(), ["function" => __FUNCTION__]);
        }
    }

    /**
     * Get the value of warehouseProductHydrator
     */
    public function getWarehouseProductHydrator()
    {
        return $this->warehouseProductHydrator;
    }

    /**
     * Set the value of warehouseProductHydrator
     *
     * @return  self
     */
    public function setWarehouseProductHydrator($warehouseProductHydrator)
    {
        $this->warehouseProductHydrator = $warehouseProductHydrator;

        return $this;
    }

    /**
     * Get the value of config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the value of config
     *
     * @return  self
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }
}
