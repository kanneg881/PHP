<?php
/**
 * Created by PhpStorm.
 * 工廠模式抽象類別
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:35
 */

namespace Chapter9\TemplateCombineFactory;

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
    public function doFactory()
    {
        // 產品屬性
        $productProperties = $this->factoryMethod();
        return $productProperties;
    }
}