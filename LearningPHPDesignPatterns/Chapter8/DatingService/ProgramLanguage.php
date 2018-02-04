<?php
/**
 * Created by PhpStorm.
 * 具體 Decorator 裝飾者
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午9:59
 */

include_once "Decorator.php";
include_once "IComponent.php";

use Chapter8\DatingService\Decorator;
use Chapter8\DatingService\IComponent;

class ProgramLanguage extends Decorator
{
    /** @var string 程式語言 */
    private $programLanguage;
    /** @var array 程式語言清單 */
    private $programLanguageList = array(
        "PHP" => "PHP",
        "CSharp" => "C#",
        "JavaScript" => "JavaScript",
        "ActionScript3" => "ActionScript 3.0"
    );

    /**
     * ProgramLanguage 建構子
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
        $output .= "$format 首選的程式語言: ";
        $output .= $this->programLanguage;
        return $output;
    }

    /**
     * 設定特徵
     *
     * @param string $programLanguageListKey 程式語言清單鍵值
     */
    public function setFeature($programLanguageListKey)
    {
        $this->programLanguage = $this->programLanguageList[$programLanguageListKey];
    }
}