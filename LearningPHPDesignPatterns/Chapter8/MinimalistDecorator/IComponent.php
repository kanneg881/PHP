<?php
/**
 * Created by PhpStorm.
 * Component 介面
 * User: Jackson
 * Date: 2018/1/8
 * Time: 上午8:49
 */

namespace Chapter8\MinimalistDecorator;

abstract class IComponent
{
    /** @var string|IComponent 網站名稱或物件 */
    protected $site;

    /**
     * 取得價錢
     *
     * @return int 價錢
     */
    abstract public function getPrice();

    /**
     * 取得網站名稱
     *
     * @return string 網站名稱
     */
    abstract public function getSite();
}