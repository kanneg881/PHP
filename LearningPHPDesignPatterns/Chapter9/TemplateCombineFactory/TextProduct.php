<?php
/**
 * Created by PhpStorm.
 * 具體文字產品
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:43
 */

include_once "Product.php";

use Chapter9\TemplateCombineFactory\Product;

class TextProduct implements Product
{
    /** @var string html 標題 */
    private $manufacturingProduct;

    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties()
    {
        $this->manufacturingProduct = "<div style='color: #CC0000; font-size: 12px;
                font-family: Verdana, Geneva, sans-serif'>
                <strong><em>標題:</em></strong> 莫迪利亞尼畫了拉長的臉。</div>";

        return $this->manufacturingProduct;
    }
}