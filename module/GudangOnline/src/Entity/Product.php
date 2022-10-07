<?php

namespace GudangOnline\Entity;

use Aqilix\ORM\Entity\EntityInterface;

/**
 * Product
 */
class Product implements EntityInterface
{
    /**
     * @var string|null
     */
    private $name;

    /**
     * @var float|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $photo;

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
     * @var \GudangOnline\Entity\ProductCategory
     */
    private $productCategory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->warehouseProducts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Product
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
     * Set price.
     *
     * @param float|null $price
     *
     * @return Product
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Product
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * @return Product
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
     * Set productCategory.
     *
     * @param \GudangOnline\Entity\ProductCategory|null $productCategory
     *
     * @return Product
     */
    public function setProductCategory(\GudangOnline\Entity\ProductCategory $productCategory = null)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory.
     *
     * @return \GudangOnline\Entity\ProductCategory|null
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }
}
