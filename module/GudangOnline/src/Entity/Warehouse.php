<?php

namespace GudangOnline\Entity;

use Aqilix\ORM\Entity\EntityInterface;

/**
 * Warehouse
 */
class Warehouse implements EntityInterface
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $type;

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
     * @var \GudangOnline\Entity\WarehouseProduct
     */
    private $warehouse;


    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Warehouse
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return Warehouse
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return Warehouse
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return Warehouse
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
     * @return Warehouse
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
     * @return Warehouse
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
     * @return Warehouse
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
     * @param \GudangOnline\Entity\WarehouseProduct|null $warehouse
     *
     * @return Warehouse
     */
    public function setWarehouse(\GudangOnline\Entity\WarehouseProduct $warehouse = null)
    {
        $this->warehouse = $warehouse;

        return $this;
    }

    /**
     * Get warehouse.
     *
     * @return \GudangOnline\Entity\WarehouseProduct|null
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }
}
