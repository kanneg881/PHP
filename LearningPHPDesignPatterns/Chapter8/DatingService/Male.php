<?php
/**
 * Created by PhpStorm.
 * IComponent 具體元件
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午9:47
 */

include_once "IComponent.php";

use Chapter8\DatingService\IComponent;

class Male extends IComponent
{
    public function __construct()
    {
        $this->gender = "男";
        $this->setFeature("<br>Dude 程序員特徵: ");
    }

    /**
     * 取得年齡
     *
     * @return int 年齡
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * 取得特徵
     *
     * @return string 特徵
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * 設定年齡
     *
     * @param int $ageGroup 年齡
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;
    }

    /**
     * 設定特徵
     *
     * @param string $feature 特徵
     */
    public function setFeature($feature)
    {
        $this->feature = $feature;
    }
}