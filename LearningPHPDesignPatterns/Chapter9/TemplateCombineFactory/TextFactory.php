<?php
/**
 * Created by PhpStorm.
 * 具體文字工廠
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:37
 */

include_once "Creator.php";
include_once "TextProduct.php";

use Chapter9\TemplateCombineFactory\Creator;

class TextFactory extends Creator
{
    /**
     * 工廠生產產品
     *
     * @return mixed 產品屬性
     */
    protected function factoryMethod()
    {
        // TextProduct 物件
        $product = new TextProduct();
        return $product->getProperties();
    }
}