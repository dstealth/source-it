<?php

/**
 * Created by PhpStorm.
 * User: Yevhen
 * Date: 15.08.2015
 * Time: 13:36
 */

namespace product_catalog;

class Product
{

    protected $name;
    protected $photo;
    protected $cost;
    protected $brand;
    protected $color;
    protected $material;

    protected $category;
    protected $stockItems = [];

    /**
     * @param $name
     * @param $photo
     * @param $price
     * @param $brand
     * @param $color
     * @param $material
     * @param $category
     */
    public function __construct($name, $photo, $price, $brand, $color, $material, $category){
        $this->name = $name;
        $this->photo = $photo;
        $this->price = $price;
        $this->brend = $brand;
        $this->color = $color;
        $this->material = $material;
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }


    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getTotalCount(){
        $result = 0;
        foreach ($this->stockItems as $item){
            $result += $item->getCount();
        }
        return $result;
    }

    public function isAvailable(){
        return $this->getTotalCount() > 0;
    }

    public function getAvailableStocks(){
        $result = [];
        foreach ($this->stockItems as $item){
            if($item->getCount() > 0){
                $result[] = $item->getStock();
            }
        }
        return $result;
    }
    
    public function setCountForStock($stock, $count){
        foreach ($this->stockItems as $key => $item) {
            if($item->getStock()->getId() == $stock->getId()){
                unset($this->stockItems[$key]);
            }
        }
        $this->stockItems[] = new StockItem($count, $stock, $this);
    }
}