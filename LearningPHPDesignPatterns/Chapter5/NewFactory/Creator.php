<?php
/**
 * Created by PhpStorm.
 * 新工廠介面
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午8:44
 */

namespace Chapter5\NewFactory;

abstract class Creator
{
    /**
     * 工廠生產產品
     *
     * @param Product $product 產品
     * @return mixed 產品屬性
     */
    protected abstract function factoryMethod(Product $product);

    /**
     * 工廠開始運作
     *
     * @param Product $productNow 目前的產品
     * @return mixed 產品屬性
     */
    public function doFactory($productNow)
    {
        // 國家產品
        $countryProduct = $productNow;
        // 產品屬性
        $productProperties = $this->factoryMethod($countryProduct);
        return $productProperties;
    }
}