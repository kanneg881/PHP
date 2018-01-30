<?php
/**
 * Created by PhpStorm.
 * 實作組合數學類別、文字類別
 * User: Jackson
 * Date: 2017/12/31
 * Time: 下午5:33
 */

include_once "DoMath.php";
include_once "DoText.php";

class ClientCompose
{
    /** @var int 加法 */
    private $added;
    /** @var float|int 除法 */
    private $divided;
    /** @var string 字串型態數字 */
    private $textNumber;
    /** @var string 輸出 */
    private $output;

    public function __construct()
    {
        $useMath = new DoMath();
        $useText = new DoText();
        $this->added = $useMath->simpleAdd(40, 60);
        $this->divided = $useMath->simpleDivide($this->added, 25);
        $this->textNumber = $useText->numberToText($this->divided);
        $this->output = $useText->addFace("你的結果", $this->textNumber);
        echo $this->output;
    }
}

$worker = new ClientCompose();