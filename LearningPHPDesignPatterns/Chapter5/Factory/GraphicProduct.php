<?php
/**
 * Created by PhpStorm.
 * 圖片產品
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午9:04
 */

namespace Chapter5;

include_once "Product.php";

class GraphicProduct implements Product
{
    /** @var mixed 製造商產品 */
    private $manufacturingProduct;

    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties()
    {
        $this->manufacturingProduct = "<img style='padding: 10px 10px 10px 0;'
        src='asset/image/Mali.gif' align='left' width='330' height='355'/>";
        return $this->manufacturingProduct;
    }
}