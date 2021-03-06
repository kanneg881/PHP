<?php
/**
 * Created by PhpStorm.
 * 具體裝飾者
 * User: Jackson
 * Date: 2018/1/9
 * Time: 上午1:00
 */

include_once "Decorator.php";
include_once "IComponent.php";

use Chapter8\MinimalistDecorator\Decorator;
use Chapter8\MinimalistDecorator\IComponent;

class Video extends Decorator
{
    /**
     * Maintenance 建構子.
     *
     * @param IComponent $site 網站元件
     */
    public function __construct(IComponent $site)
    {
        $this->site = $site;
    }

    /**
     * 取得價錢
     *
     * @return int 價錢
     */
    public function getPrice()
    {
        return 350 + $this->site->getPrice();
    }

    /**
     * 取得網站名稱
     *
     * @return string 網站名稱
     */
    public function getSite()
    {
        $format = "<br>&nbsp;&nbsp; 影音 ";
        return $this->site->getSite() . $format;
    }
}