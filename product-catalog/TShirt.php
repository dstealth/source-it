<?php
/**
 * Created by PhpStorm.
 * User: Yevhen
 * Date: 15.08.2015
 * Time: 13:46
 */

namespace product_catalog;


class TShirt extends AdvancedProduct
{

    public static $SIZES = ['XS', 'S', 'M', 'M', 'XL'];

    /**
     * @return string
     */
    public function __toString(){
        return ucfirst($this->getGender()) . ' ' . strtolower(__CLASS__) . ' ' . $this->getBrand() . ' ' . $this->getName();
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        if (in_array($size, self::$SIZES)) {
            $this->size = $size;
        } else {
            user_error("Invalid value: $size for property size");
        }
    }

}