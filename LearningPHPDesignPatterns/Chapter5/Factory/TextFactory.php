<?php
/**
 * Created by PhpStorm.
 * 文字工廠
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午8:50
 */

namespace Chapter5;

include_once "Creator.php";
include_once "TextProduct.php";

class TextFactory extends Creator
{
    /**
     * 工廠生產產品
     *
     * @return mixed 產品屬性
     */
    protected function factoryMethod()
    {
        // 產品
        $product = new TextProduct();
        return $product->getProperties();
    }
}