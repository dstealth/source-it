<?php
/**
 * Created by PhpStorm.
 * User: Yevhen
 * Date: 15.08.2015
 * Time: 15:12
 */

namespace product_catalog;


class Cap extends Product{

    /**
     * @return string
     */
    public function __toString() {
        return __CLASS__ . ' ' . $this->getBrand() . ' ' . $this->getName();
    }
}