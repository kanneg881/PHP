<?php
/**
 * Created by PhpStorm.
 * 工廠的產品
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:39
 */

namespace Chapter9\TemplateCombineFactory;

interface Product
{
    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties();
}