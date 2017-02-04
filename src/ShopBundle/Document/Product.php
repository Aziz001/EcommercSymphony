<?php
namespace ShopBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Product
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $productName;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $category;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $brand;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $productMaterial;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $imageUrl;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $delivery;
    
    /**
     * @MongoDB\Field(type="string")
     */
    protected $details;

    /**
     * @MongoDB\Field(type="int")
     */
    protected $price;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return $this
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * Get productName
     *
     * @return string $productName
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return $this
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return string $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Get brand
     *
     * @return string $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set productMaterial
     *
     * @param string $productMaterial
     * @return $this
     */
    public function setProductMaterial($productMaterial)
    {
        $this->productMaterial = $productMaterial;
        return $this;
    }

    /**
     * Get productMaterial
     *
     * @return string $productMaterial
     */
    public function getProductMaterial()
    {
        return $this->productMaterial;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string $imageUrl
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set delivery
     *
     * @param string $delivery
     * @return $this
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * Get delivery
     *
     * @return string $delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set details
     *
     * @param String $details
     * @return $this
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * Get details
     *
     * @return String $details
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set price
     *
     * @param Int  $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return Int  $price
     */
    public function getPrice()
    {
        return $this->price;
    }
}
