<?php
/**
 * Created by PhpStorm.
 * User: Yevhen
 * Date: 15.08.2015
 * Time: 14:23
 */

namespace product_catalog;


class Sneakers extends AdvancedProduct
{
    public static $SIZE_INTERVAL = ['MIN' => 36, 'MAX' => 45];
    public static $SNEAKERS_TYPE = ['jogging', 'tennis', 'football', 'basketball', 'skate'];

    /**
     * @var
     */
    protected $type;


    /**
     * @var Sneakers
     */
    protected $isStudded;


    /**
     * @param $name
     * @param $photo
     * @param $price
     * @param $brand
     * @param $color
     * @param $material
     * @param $category
     * @param $size
     * @param $gender
     * @param $type
     * @param $isStudded
     */
    public function __construct($name, $photo, $price, $brand, $color, $material, $category, $size, $gender, $type, $isStudded){
        parent::__construct($name, $photo, $price, $brand, $color, $material, $category, $size, $gender);
        $this->type = $type;
        $this->isStudded = $isStudded;
    }

    /**
     * @return string
     */
    public function __toString(){
        return ucfirst($this->getGender()) . ' ' . $this->getType() . ' ' . strtolower(__CLASS__) . ' ' . $this->getBrand() . ' ' . $this->getName();
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        if ($size >= self::$SIZE_INTERVAL['MIN'] && $size <= self::$SIZE_INTERVAL['MAX']) {
            $this->size = $size;
        } else {
            user_error("Invalid value: $size for property size");
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if (in_array($type, self::$SNEAKERS_TYPE)) {
            $this->type = $type;
        } else {
            user_error("Invalid value: $type for property type");
        }
    }


    /**
     * @return mixed
     */
    public function getIsStudded()
    {
        return $this->isStudded;
    }

    /**
     * @param mixed $isStudded
     */
    public function setIsStudded($isStudded)
    {
        if (is_bool($isStudded)) {
            $this->isStudded = !!$isStudded;
        } else {
            user_error("Invalid value: $isStudded for property isStudded");
        }

    }


}