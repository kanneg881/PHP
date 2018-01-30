<?php
/**
 * Created by PhpStorm.
 * 文字類別
 * User: Jackson
 * Date: 2017/12/31
 * Time: 下午5:30
 */

class DoText
{
    /** @var string 文字輸出 */
    private $textOut;
    /** @var string 全面 */
    private $fullFace;

    /**
     * 數字輸出
     *
     * @param int $number 數字
     * @return string 數字字串
     */
    public function numberToText($number)
    {
        // 強制轉型成字串
        $this->textOut = (string)$number;
        return $this->textOut;
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
        $this->fullFace = "<strong>" . $face . "</strong>:" . $message;
        return $this->fullFace;
    }
}