<?php
/**
 * Created by PhpStorm.
 * IComponent 具體元件
 * User: Jackson
 * Date: 2018/1/8
 * Time: 上午9:02
 */

include_once "IComponent.php";

use Chapter8\MinimalistDecorator\IComponent;

class BasicSite extends IComponent
{
    public function __construct()
    {
        $this->site = "基本網站";
    }

    /**
     * 取得價錢
     *
     * @return int 價錢
     */
    public function getPrice()
    {
        return 1200;
    }

    /**
     * 取得網站名稱
     *
     * @return string 網站名稱
     */
    public function getSite()
    {
        return $this->site;
    }
}