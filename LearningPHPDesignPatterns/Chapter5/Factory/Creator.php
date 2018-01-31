<?php
/**
 * Created by PhpStorm.
 * 工廠介面
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午8:44
 */

namespace Chapter5;

abstract class Creator
{
    /**
     * 工廠生產產品
     *
     * @return mixed 產品屬性
     */
    protected abstract function factoryMethod();

    /**
     * 工廠開始運作
     *
     * @return mixed 產品屬性
     */
    public function startFactory()
    {
        // 產品屬性
        $productProperties = $this->factoryMethod();
        return $productProperties;
    }
}