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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $warehouseProducts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouseProducts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add warehouseProduct.
     *
     * @param \GudangOnline\Entity\WarehouseProduct $warehouseProduct
     *
     * @return Warehouse
     */
    public function addWarehouseProduct(\GudangOnline\Entity\WarehouseProduct $warehouseProduct)
    {
        $this->warehouseProducts[] = $warehouseProduct;

        return $this;
    }

    /**
     * Remove warehouseProduct.
     *
     * @param \GudangOnline\Entity\WarehouseProduct $warehouseProduct
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeWarehouseProduct(\GudangOnline\Entity\WarehouseProduct $warehouseProduct)
    {
        return $this->warehouseProducts->removeElement($warehouseProduct);
    }

    /**
     * Get warehouseProducts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWarehouseProducts()
    {
        return $this->warehouseProducts;
    }

    /**
     * Add product.
     *
     * @param \GudangOnline\Entity\Product $product
     *
     * @return Warehouse
     */
    public function addProduct(\GudangOnline\Entity\Product $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product.
     *
     * @param \GudangOnline\Entity\Product $product
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProduct(\GudangOnline\Entity\Product $product)
    {
        return $this->products->removeElement($product);
    }

    /**
     * Get products.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}
