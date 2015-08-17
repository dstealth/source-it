<?php


namespace product_catalog;


class AdvancedProduct extends Product
{

    protected $size;
    protected $gender;


    public static $GENDERS = ['Male', 'Female'];


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
     */
    public function __construct($name, $photo, $price, $brand, $color, $material, $category, $size, $gender){
        parent::__construct($name, $photo, $price, $brand, $color, $material, $category);
        $this->size = $size;
        $this->gender = $gender;
    }


    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }


    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        if (in_array($gender, self::$GENDERS)) {
            $this->gender = $gender;
        } else {
            user_error("Invalid value: $gender for property gender");
        }
    }

}