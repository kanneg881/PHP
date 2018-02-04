<?php
/**
 * Created by PhpStorm.
 * 具體圖片產品
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:40
 */

include_once "Product.php";

use Chapter9\TemplateCombineFactory\Product;

class GraphicProduct implements Product
{
    /** @var string html img 元素 */
    private $manufacturingProduct;

    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties()
    {
        $this->manufacturingProduct = "<img src='asset/image/modigliani.jpg'>";
        return $this->manufacturingProduct;
    }
}