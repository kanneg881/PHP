<?php
/**
 * Created by PhpStorm.
 * 具體 Decorator 裝飾者
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午10:09
 */

include_once "Decorator.php";
include_once "IComponent.php";

use Chapter8\DatingService\Decorator;
use Chapter8\DatingService\IComponent;

class Hardware extends Decorator
{
    /** @var string 硬體 */
    private $hardware;

    /** @var array 品牌清單 */
    private $brandList = array(
        "MAC" => "蘋果",
        "DELL" => "戴爾",
        "HP" => "惠普",
        "LINUX" => "Linux"
    );

    /**
     * Hardware 建構子
     *
     * @param IComponent $gender 具體IComponent
     */
    public function __construct(IComponent $gender)
    {
        $this->gender = $gender;
    }

    /**
     * 取得特徵
     *
     * @return string 特徵
     */
    public function getFeature()
    {
        // 輸出
        $output = $this->gender->getFeature();
        // 格式化
        $format = "<br>&nbsp;&nbsp;";
        $output .= "$format 目前硬體: ";
        $output .= $this->hardware;
        return $output;
    }

    /**
     * 設定特徵
     *
     * @param string $brandListKey 品牌清單鍵值
     */
    public function setFeature($brandListKey)
    {
        $this->hardware = $this->brandList[$brandListKey];
    }
}