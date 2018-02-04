<?php
/**
 * Created by PhpStorm.
 * 元件介面
 * User: Jackson
 * Date: 2018/1/10
 * Time: 上午9:54
 */

namespace Chapter8\DatingService;

abstract class IComponent
{
    /** @var string 性別 */
    protected $gender;
    /**
     * @var string
     * 年齡群組
     * 18-29: 第1組
     * 30-39: 第2組
     * 40-49: 第3組
     * 50+ : 第4組
     */
    protected $ageGroup;
    /** @var string 特徵 */
    protected $feature;

    /**
     * 取得年齡群組
     *
     * @return string 年齡群組
     */
    abstract public function getAgeGroup();

    /**
     * 取得特徵
     *
     * @return string 特徵
     */
    abstract public function getFeature();

    /**
     * 設定年齡群組
     *
     * @param string $ageGroup 年齡群組
     */
    abstract public function setAgeGroup($ageGroup);

    /**
     * 設定特徵
     *
     * @param string $feature 特徵
     */
    abstract public function setFeature($feature);
}