<?php
/**
 * Created by PhpStorm.
 * 飢餓工廠
 * User: Jackson
 * Date: 2018/1/22
 * Time: 下午12:18
 */

include_once "Creator.php";

class HungerFactory extends Creator
{
    /** @var Product 國家產品 */
    private $countryProduct;

    /**
     * 工廠生產產品
     *
     * @param Product $product 產品
     * @return mixed 產品屬性
     */
    protected function factoryMethod(Product $product)
    {
        $this->countryProduct = $product;
        return ($this->countryProduct->getProperties());
    }
}