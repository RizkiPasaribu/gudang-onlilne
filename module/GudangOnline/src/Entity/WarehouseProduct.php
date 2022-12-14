<?php

namespace GudangOnline\Entity;

use Aqilix\ORM\Entity\EntityInterface;

/**
 * WarehouseProduct
 */
class WarehouseProduct implements EntityInterface
{
    /**
     * @var int|null
     */
    private $stock;

    /**
     * @var \DateTime|null
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     */
    private $updatedAt;

    /**
     * @var \DateTime|null
     */
    private $deletedAt;

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var \GudangOnline\Entity\Product
     */
    private $product;

    /**
     * @var \GudangOnline\Entity\Warehouse
     */
    private $warehouse;


    /**
     * Set stock.
     *
     * @param int|null $stock
     *
     * @return WarehouseProduct
     */
    public function setStock($stock = null)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock.
     *
     * @return int|null
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return WarehouseProduct
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return WarehouseProduct
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt.
     *
     * @param \DateTime|null $deletedAt
     *
     * @return WarehouseProduct
     */
    public function setDeletedAt($deletedAt = null)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt.
     *
     * @return \DateTime|null
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Get uuid.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set product.
     *
     * @param \GudangOnline\Entity\Product|null $product
     *
     * @return WarehouseProduct
     */
    public function setProduct(\GudangOnline\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product.
     *
     * @return \GudangOnline\Entity\Product|null
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set warehouse.
     *
     * @param \GudangOnline\Entity\Warehouse|null $warehouse
     *
     * @return WarehouseProduct
     */
    public function setWarehouse(\GudangOnline\Entity\Warehouse $warehouse = null)
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse.
     *
     * @return \GudangOnline\Entity\Warehouse|null
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }
}
