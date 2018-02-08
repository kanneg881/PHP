<?php
/**
 * Created by PhpStorm.
 * 產品介面
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午8:58
 */

interface Product
{
    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties();
}