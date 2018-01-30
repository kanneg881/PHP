<?php
/**
 * Created by PhpStorm.
 * 實例化 InheritMath
 * User: Jackson
 * Date: 2017/12/31
 * Time: 下午12:05
 */

include_once "InheritMath.php";

class ClientInherit
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
        $family = new InheritMath();
        $this->added = $family->simpleAdd(40, 60);
        $this->divided = $family->simpleDivide($this->added, 25);
        $this->textNumber = $family->numberToText($this->divided);
        $this->output = $family->addFace("你的結果", $this->textNumber);
        echo $this->output;
    }
}

$worker = new ClientInherit();