<?php
/**
 * Created by PhpStorm.
 * 工廠介面
 * User: Jackson
 * Date: 2018/1/22
 * Time: 下午12:11
 */

abstract class Creator
{
    /** @var Product 產品 */
    protected $product;

    /**
     * 工廠生產產品
     *
     * @param Product $product 產品
     * @return mixed 產品屬性
     */
    protected abstract function factoryMethod(Product $product);

    /**
     * 具體工廠生產產品
     *
     * @param Product $product 產品
     * @return mixed 產品屬性
     */
    public function feedbackFactory(Product $product)
    {
        $this->product = $product;
        // 產品屬性
        $productProperties = $this->factoryMethod($this->product);
        return $productProperties;
    }
}