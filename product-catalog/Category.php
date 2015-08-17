<?php
/**
 * Created by PhpStorm.
 * User: dmitry
 * Date: 17.08.15
 * Time: 13:21
 */

namespace product_catalog;


class Category
{
    protected $name;
    protected $parent;
    protected $children = [];
    protected $products = [];

    /**
     * @param $name
     */
    public function __construct($name){
        $this->name = $name;
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
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param $parent
     * @param bool|true $crossLinking
     */
    public function setParent($parent, $crossLinking = true)
    {
        if ($this->parent) {
            $this->parent->removeChild($this, false);
        }
        $this->parent = $parent;
        if ($crossLinking && $parent) {
            $parent->addChild($this, false);
        }
    }

    /**
     * @param array $children
     */
    public function setChildren(array $children)
    {
        $oldChildren = $this->children;
        foreach ($oldChildren as $child) {
            $this->removeChild($child);
        }
        foreach ($children as $child) {
            $this->addChild($child);
        }
    }

    /**
     * @param Category $category
     * @param bool|true $crossLinking
     */
    public function addChild(Category $category, $crossLinking = true)
    {
        if (!in_array($category, $this->children)) {
            $this->children[] = $category;
            if ($crossLinking) {
                $category->setParent($this, false);
            }
        }
    }

    /**
     * @param Category $category
     * @param bool|true $crossLinking
     */
    public function removeChild(Category $category, $crossLinking = true)
    {
        $index = array_search($category, $this->children);
        if ($index !== false) {
            unset($this->children[$index]);
            if ($crossLinking) {
                $category->setParent(null, false);
            }
        }
    }

    /**
     * @param \Product[] $products
     */
    public function setProducts(array $products)
    {
        $oldProducts = $this->products;
        foreach ($oldProducts as $product) {
            $this->removeProduct($product);
        }
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    /**
     * @param Product $product
     * @param bool|true $crossLinking
     */
    public function addProduct(Product $product, $crossLinking = true)
    {
        if (!in_array($product, $this->products)) {
            $this->products[] = $product;
            if ($crossLinking) {
                $product->setCategory($this, false);
            }
        }
    }
    /**
     * @param Product $product
     * @param bool $crossLinking
     */
    public function removeProduct(Product $product, $crossLinking = true)
    {
        $index = array_search($product, $this->products);
        if ($index !== false) {
            unset($this->products[$index]);
            if ($crossLinking) {
                $product->setCategory(null, false);
            }
        }
    }

    /**
     * @return \Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

}