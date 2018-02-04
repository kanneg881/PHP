<?php
/**
 * Created by PhpStorm.
 * 具體 Decorator 裝飾者
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午10:13
 */

include_once "Decorator.php";
include_once "IComponent.php";

use Chapter8\DatingService\Decorator;
use Chapter8\DatingService\IComponent;

class Food extends Decorator
{
    /** @var string 食物 */
    private $food;

    /** @var array 點心清單 */
    private $snacksList = array(
        "pizza" => "披薩",
        "burger" => "漢堡",
        "nachos" => "玉米片",
        "veggies" => "蔬菜"
    );

    /**
     * Food 建構子
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
        $output .= "$format 最喜歡的食物: ";
        $output .= $this->food;
        return $output;
    }

    /**
     * 設定特徵
     *
     * @param string $snacksListKey 點心清單鍵值
     */
    public function setFeature($snacksListKey)
    {
        $this->food = $this->snacksList[$snacksListKey];
    }
}