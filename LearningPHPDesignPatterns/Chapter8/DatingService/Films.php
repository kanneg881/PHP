<?php
/**
 * Created by PhpStorm.
 * 練習添加裝飾
 * User: Jackson
 * Date: 2018/1/11
 * Time: 上午9:27
 */

include_once "Decorator.php";
include_once "IComponent.php";

use Chapter8\DatingService\Decorator;
use Chapter8\DatingService\IComponent;

class Films extends Decorator
{
    /** @var string 類型 */
    private $genre;

    /** @var array 類型清單 */
    private $genreList = array(
        "action" => "動作",
        "romance" => "愛情",
        "Science" => "科幻",
        "horror" => "恐怖"
    );

    /**
     * Films 建構子
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
        $output .= "$format 最喜歡的電影類型: ";
        $output .= $this->genre;
        return $output;
    }

    /**
     * 設定特徵
     *
     * @param string $genreListKey 類型清單鍵值
     */
    public function setFeature($genreListKey)
    {
        $this->genre = $this->genreList[$genreListKey];
    }
}