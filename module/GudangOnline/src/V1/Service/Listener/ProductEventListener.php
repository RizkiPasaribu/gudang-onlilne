<?php

namespace GudangOnline\V1\Service\Listener;

use GudangOnline\Entity\Product;;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Exception\InvalidArgumentException;
use Psr\Log\LoggerAwareTrait;
use GudangOnline\Mapper\ProductTrait;
use Zend\EventManager\EventManagerAwareTrait;
use GudangOnline\V1\ProductEvent;
use Zend\Log\Exception\RuntimeException;

class ProductEventListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use EventManagerAwareTrait;
    use LoggerAwareTrait;
    // use ProductTrait;

    protected $config;
    protected $productEvent;
    protected $productHydrator;
    protected $productIndicatorHydrator;
    protected $productIndicatorAttachmentHydrator;
    protected $fillingTimeRangeHydrator;

    protected $productMapper;

    public function __construct(
        $productMapper
    ) {
        $this->productMapper = $productMapper;
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\EventManager\ListenerAggregateInterface::attach()
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            ProductEvent::EVENT_CREATE_PRODUCT,
            [$this, 'createProduct'],
            500
        );

        $this->listeners[] = $events->attach(
            ProductEvent::EVENT_EDIT_PRODUCT,
            [$this, 'editProduct'],
            500
        );

        $this->listeners[] = $events->attach(
            ProductEvent::EVENT_DELETE_PRODUCT,
            [$this, 'deleteProduct'],
            500
        );
    }

    public function createProduct(ProductEvent $event)
    {
        try {
            if (!$event->getInputFilter() instanceof InputFilterInterface) {
                throw new InvalidArgumentException('Input Filter not set');
            }
            $bodyRequest = $event->getInputFilter()->getValues();
            $productEntity = new Product;
            $hydrateEntity  = $this->getProductHydrator()->hydrate($bodyRequest, $productEntity);
            $entityResult   = $this->productMapper->save($hydrateEntity);
            $event->setProductEntity($entityResult);
            $uuid = $productEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: New Product {uuid} created successfully",
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

    public function editProduct(ProductEvent $event)
    {
        try {
            $inputFilter = $event->getInputFilter();
            if (!$inputFilter instanceof InputFilterInterface)
                throw new InvalidArgumentException('InputFilter not set');

            $bodyRequest = $inputFilter->getValues();

            $entity = $event->getProductEntity();

            $entity->setUpdatedAt(new \DateTime('now'));
            $hydratedEntity = $this->productHydrator->hydrate($bodyRequest, $entity);

            if (!($hydratedEntity instanceof Product))
                throw new \Exception('HyratedEntity is not instance of Product Entity');

            $resultEntity  = $this->productMapper->save($hydratedEntity);

            if (!($resultEntity instanceof Product))
                throw new \Exception("ResultEntity is not instance of Product Entity");
            $event->setProductEntity($resultEntity);
            $uuid = $resultEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: Product {uuid} updated successfully",
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

    public function deleteProduct(ProductEvent $event)
    {
        try {
            $deletedData = $event->getDeleteData();
            $this->productMapper->delete($deletedData);
            $uuid   = $deletedData->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function} {uuid}: Data Product deleted successfully",
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
     * Get the value of productHydrator
     */
    public function getProductHydrator()
    {
        return $this->productHydrator;
    }

    /**
     * Set the value of productHydrator
     *
     * @return  self
     */
    public function setProductHydrator($productHydrator)
    {
        $this->productHydrator = $productHydrator;

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
