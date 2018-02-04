<?php
/**
 * Created by PhpStorm.
 * 具體圖片工廠
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:36
 */

include_once "Creator.php";
include_once "GraphicProduct.php";

use Chapter9\TemplateCombineFactory\Creator;

class GraphicFactory extends Creator
{
    /**
     * 工廠生產產品
     *
     * @return mixed 產品屬性
     */
    protected function factoryMethod()
    {
        // GraphicProduct 物件
        $product = new GraphicProduct();
        return $product->getProperties();
    }
}