<?php
/**
 * Created by PhpStorm.
 * 實作格子6狀態
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午11:26
 */

include_once "IMatrix.php";

class Cell6State implements IMatrix
{
    /** @var Context Context物件 */
    private $context;

    /**
     * Cell6State 建構子.
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
        echo "<img src='asset/image/cells/nine.png'>";
        $this->context->setState($this->context->getCell9State());
    }

    /**
     * 往左走
     */
    public function goLeft()
    {
        echo "<img src='asset/image/cells/five.png'>";
        $this->context->setState($this->context->getCell5State());
    }

    /**
     * 往右走
     */
    public function goRight()
    {
        // 非法的移動
    }

    /**
     * 往上走
     */
    public function goUp()
    {
        echo "<img src='asset/image/cells/three.png'>";
        $this->context->setState($this->context->getCell3State());
    }
}