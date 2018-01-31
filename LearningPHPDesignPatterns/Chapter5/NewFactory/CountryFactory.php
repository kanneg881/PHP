<?php
/**
 * Created by PhpStorm.
 * 國家工廠
 * User: Jackson
 * Date: 2018/1/4
 * Time: 上午8:43
 */

include_once "Creator.php";
include_once "Product.php";

use Chapter5\NewFactory\Creator;
use Chapter5\NewFactory\Product;

class CountryFactory extends Creator
{
    /** @var Product 國家 */
    private $country;

    /**
     * 工廠生產產品
     *
     * @param Product $product 產品
     * @return mixed 產品屬性
     */
    protected function factoryMethod(Product $product)
    {
        $this->country = $product;
        return $this->country->getProperties();
    }
}