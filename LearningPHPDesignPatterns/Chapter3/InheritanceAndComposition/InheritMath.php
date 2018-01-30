<?php
/**
 * Created by PhpStorm.
 * 使用繼承的方式，繼承數學類別
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午11:57
 */

include_once "DoMath.php";

class InheritMath extends DoMath
{
    /** @var string 文字輸出 */
    private $textOutput;
    /** @var string 全面 */
    private $fullFace;

    /**
     * 數字轉型字串輸出
     *
     * @param int $number 數字
     * @return string 數字字串
     */
    public function numberToText($number)
    {
        $this->textOutput = (string)$number;
        return $this->textOutput;
    }

    /**
     * 新增全面訊息
     *
     * @param string $face 全面內容
     * @param string $message 訊息
     * @return string 全面訊息
     */
    public function addFace($face, $message)
    {
        $this->fullFace = "<strong>" . $face . "</strong>: " . $message;
        return $this->fullFace;
    }
}