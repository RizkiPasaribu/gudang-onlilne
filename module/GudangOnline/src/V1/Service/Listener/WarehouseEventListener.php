<?php

namespace GudangOnline\V1\Service\Listener;


use GudangOnline\Entity\Warehouse;
use GudangOnline\Entity\Product;
use GudangOnline\Entity\WarehouseProduct;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Exception\InvalidArgumentException;
use Psr\Log\LoggerAwareTrait;
use Zend\EventManager\EventManagerAwareTrait;
use GudangOnline\V1\WarehouseEvent;
use Zend\Log\Exception\RuntimeException;

class WarehouseEventListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use EventManagerAwareTrait;
    use LoggerAwareTrait;
    // use WarehouseTrait;

    protected $config;
    protected $warehouseEvent;
    protected $warehouseHydrator;
    protected $warehouseIndicatorHydrator;
    protected $warehouseIndicatorAttachmentHydrator;
    protected $fillingTimeRangeHydrator;

    protected $warehouseMapper;
    protected $productMapper;
    protected $warehouseProductMapper;

    public function __construct(
        $warehouseMapper,
        $productMapper,
        $warehouseProductMapper
    ) {
        $this->warehouseMapper = $warehouseMapper;
        $this->productMapper = $productMapper;
        $this->warehouseProductMapper = $warehouseProductMapper;
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            WarehouseEvent::EVENT_CREATE_WAREHOUSE,
            [$this, 'createWarehouse'],
            500
        );


        $this->listeners[] = $events->attach(
            WarehouseEvent::EVENT_EDIT_WAREHOUSE,
            [$this, 'editWarehouse'],
            500
        );

        $this->listeners[] = $events->attach(
            WarehouseEvent::EVENT_DELETE_WAREHOUSE,
            [$this, 'deleteWarehouse'],
            500
        );
    }


    public function saveProduct(WarehouseEvent $event)
    {
        try {
            //get entity warehouse
            $warehouseEntity = $event->getWarehouseEntity();
            $optionFields = $event->getOptionFields();
            $this->logger->log(
                \Psr\Log\LogLevel::DEBUG,
                "{function}: Product Fields data @ provilEventListener \n =========> {data}",
                [
                    "function" => __FUNCTION__,
                    "data" => json_encode($optionFields)
                ]
            );


            //bikin product
            foreach ($optionFields as $option) {
                $productEntity = new Product;
                $productEntity->setName($option->name);
                $productEntity->setPrice($option->price);
                $productEntity->setCreatedAt(new \DateTime('now'));
                $productEntity->setUpdatedAt(new \DateTime('now'));
                $saveProduct = $this->productMapper->save($productEntity);

                $warehouseProductEntity = new WarehouseProduct;
                $warehouseProductEntity->setProduct($saveProduct);
                $warehouseProductEntity->setWarehouse($warehouseEntity);
                $warehouseProductEntity = $this->warehouseProductMapper->save($warehouseProductEntity);

                $this->logger->log(
                    \Psr\Log\LogLevel::INFO,
                    "{function}: {uuid} Product Fields saved successfully",
                    [
                        "function" => __FUNCTION__,
                        "uuid" => $saveProduct->getUuid()
                    ]
                );
            }
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

    public function createWarehouse(WarehouseEvent $event)
    {
        try {
            if (!$event->getInputFilter() instanceof InputFilterInterface) {
                throw new InvalidArgumentException('Input Filter not set');
            }
            $bodyRequest = $event->getInputFilter()->getValues();
            $warehouseEntity = new Warehouse;
            $hydrateEntity  = $this->getWarehouseHydrator()->hydrate($bodyRequest, $warehouseEntity);
            $entityResult   = $this->warehouseMapper->save($hydrateEntity);
            $event->setWarehouseEntity($entityResult);
            $uuid = $warehouseEntity->getUuid();


            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: New Warehouse {uuid} created successfully",
                [
                    "function" => __FUNCTION__,
                    "uuid" => $uuid
                ]
            );

            $this->saveProduct($event);
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

    public function editWarehouse(WarehouseEvent $event)
    {
        try {
            $inputFilter = $event->getInputFilter();
            if (!$inputFilter instanceof InputFilterInterface)
                throw new InvalidArgumentException('InputFilter not set');

            $bodyRequest = $inputFilter->getValues();

            $entity = $event->getWarehouseEntity();

            $entity->setUpdatedAt(new \DateTime('now'));
            $hydratedEntity = $this->warehouseHydrator->hydrate($bodyRequest, $entity);

            if (!($hydratedEntity instanceof Warehouse))
                throw new \Exception('HyratedEntity is not instance of Warehouse Entity');

            $resultEntity  = $this->warehouseMapper->save($hydratedEntity);

            if (!($resultEntity instanceof Warehouse))
                throw new \Exception("ResultEntity is not instance of Warehouse Entity");
            $event->setWarehouseEntity($resultEntity);
            $uuid = $resultEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: Warehouse {uuid} updated successfully",
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

    public function deleteWarehouse(WarehouseEvent $event)
    {
        try {
            $deletedData = $event->getDeleteData();
            $this->warehouseMapper->delete($deletedData);
            $uuid   = $deletedData->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function} {uuid}: Data Warehouse deleted successfully",
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
     * Get the value of warehouseHydrator
     */
    public function getWarehouseHydrator()
    {
        return $this->warehouseHydrator;
    }

    /**
     * Set the value of warehouseHydrator
     *
     * @return  self
     */
    public function setWarehouseHydrator($warehouseHydrator)
    {
        $this->warehouseHydrator = $warehouseHydrator;

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
