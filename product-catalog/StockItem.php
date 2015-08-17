<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 17.08.15
 * Time: 16:57
 */

namespace product_catalog;


class StockItem
{
    protected $count;
    protected $stock;
    protected $product;

    /**
     * StockItem constructor.
     * @param $count
     * @param $stock
     * @param $product
     */
    public function __construct($count, $stock, $product)
    {
        $this->count = $count;
        $this->stock = $stock;
        $this->product = $product;
    }


    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

/*    public function getHowManyProducts(){
        return $this->count;
    }*/



    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }


    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }



}