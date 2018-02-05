<?php
/**
 * Created by PhpStorm.
 * 實作格子5狀態
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午11:23
 */

include_once "IMatrix.php";

class Cell5State implements IMatrix
{
    /** @var Context Context物件 */
    private $context;

    /**
     * Cell5State 建構子.
     *
     * @param Context $context Context物件
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * 往下走
     */
    public function goDown()
    {
        echo "<img src='asset/image/cells/eight.png'>";
        $this->context->setState($this->context->getCell8State());
    }

    /**
     * 往左走
     */
    public function goLeft()
    {
        echo "<img src='asset/image/cells/four.png'>";
        $this->context->setState($this->context->getCell4State());
    }

    /**
     * 往右走
     */
    public function goRight()
    {
        echo "<img src='asset/image/cells/six.png'>";
        $this->context->setState($this->context->getCell6State());
    }

    /**
     * 往上走
     */
    public function goUp()
    {
        echo "<img src='asset/image/cells/two.png'>";
        $this->context->setState($this->context->getCell2State());
    }
}