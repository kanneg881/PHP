<?php
/**
 * Created by PhpStorm.
 * 繪圖工廠
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午8:55
 */

namespace Chapter5;

include_once "Creator.php";
include_once "GraphicProduct.php";

class GraphicFactory extends Creator
{
    /**
     * 工廠生產產品
     *
     * @return mixed 產品屬性
     */
    protected function factoryMethod()
    {
        // 產品
        $product = new GraphicProduct();
        return $product->getProperties();
    }
}