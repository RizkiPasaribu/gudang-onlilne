<?php

namespace GudangOnline\V1\Service\Listener;

use GudangOnline\Entity\ProductCategory;

use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\Exception\InvalidArgumentException;
use Psr\Log\LoggerAwareTrait;
use GudangOnline\Mapper\ProductCategoryTrait;
use Zend\EventManager\EventManagerAwareTrait;
use GudangOnline\V1\ProductCategoryEvent;
use Zend\Log\Exception\RuntimeException;

class ProductCategoryEventListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use EventManagerAwareTrait;
    use LoggerAwareTrait;
    // use ProductCategoryTrait;

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
            ProductCategoryEvent::EVENT_CREATE_PRODUCT_CATEGORY,
            [$this, 'createProductCategory'],
            500
        );

        $this->listeners[] = $events->attach(
            ProductCategoryEvent::EVENT_EDIT_PRODUCT_CATEGORY,
            [$this, 'editProductCategory'],
            500
        );

        $this->listeners[] = $events->attach(
            ProductCategoryEvent::EVENT_DELETE_PRODUCT_CATEGORY,
            [$this, 'deleteProductCategory'],
            500
        );
    }

    public function createProductCategory(ProductCategoryEvent $event)
    {
        try {
            if (!$event->getInputFilter() instanceof InputFilterInterface) {
                throw new InvalidArgumentException('Input Filter not set');
            }
            $bodyRequest = $event->getInputFilter()->getValues();
            $productEntity = new ProductCategory;
            $hydrateEntity  = $this->getProductCategoryHydrator()->hydrate($bodyRequest, $productEntity);
            $entityResult   = $this->productMapper->save($hydrateEntity);
            $event->setProductCategoryEntity($entityResult);
            $uuid = $productEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: New ProductCategory {uuid} created successfully",
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

    public function editProductCategory(ProductCategoryEvent $event)
    {
        try {
            $inputFilter = $event->getInputFilter();
            if (!$inputFilter instanceof InputFilterInterface)
                throw new InvalidArgumentException('InputFilter not set');

            $bodyRequest = $inputFilter->getValues();

            $entity = $event->getProductCategoryEntity();

            $entity->setUpdatedAt(new \DateTime('now'));
            $hydratedEntity = $this->productHydrator->hydrate($bodyRequest, $entity);

            if (!($hydratedEntity instanceof ProductCategory))
                throw new \Exception('HyratedEntity is not instance of ProductCategory Entity');

            $resultEntity  = $this->productMapper->save($hydratedEntity);

            if (!($resultEntity instanceof ProductCategory))
                throw new \Exception("ResultEntity is not instance of ProductCategory Entity");
            $event->setProductCategoryEntity($resultEntity);
            $uuid = $resultEntity->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function}: ProductCategory {uuid} updated successfully",
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

    public function deleteProductCategory(ProductCategoryEvent $event)
    {
        try {
            $deletedData = $event->getDeleteData();
            $this->productMapper->delete($deletedData);
            $uuid   = $deletedData->getUuid();

            $this->logger->log(
                \Psr\Log\LogLevel::INFO,
                "{function} {uuid}: Data ProductCategory deleted successfully",
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
    public function getProductCategoryHydrator()
    {
        return $this->productHydrator;
    }

    /**
     * Set the value of productHydrator
     *
     * @return  self
     */
    public function setProductCategoryHydrator($productHydrator)
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
