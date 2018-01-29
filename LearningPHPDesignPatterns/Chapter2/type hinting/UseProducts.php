<?php
/**
 * Created by PhpStorm.
 * 使用類型提示的物件
 * User: Jackson
 * Date: 2017/12/29
 * Time: 上午9:26
 */

include_once "FruitStore.php";
include_once "CitrusStore.php";

class UseProducts
{
    public function __construct()
    {
        /** @var FruitStore $appleSauce */
        $appleSauce = new FruitStore();
        /** @var CitrusStore $orangeJuice */
        $orangeJuice = new CitrusStore();
        $this->doInterface($appleSauce);
        $this->doInterface($orangeJuice);
    }

    /**
     * IProduct 是 doInterface() 的類型提示
     *
     * @param IProduct $product
     */
    function doInterface(IProduct $product)
    {
        echo $product->apples();
        echo $product->oranges();
    }
}

$worker = new UseProducts();