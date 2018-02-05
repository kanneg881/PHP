<?php
/**
 * Created by PhpStorm.
 * 實作格子3狀態
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午11:20
 */

include_once "IMatrix.php";

class Cell4State implements IMatrix
{
    /** @var Context Context物件 */
    private $context;

    /**
     * Cell4State 建構子.
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
        echo "<img src='asset/image/cells/seven.png'>";
        $this->context->setState($this->context->getCell7State());
    }

    /**
     * 往左走
     */
    public function goLeft()
    {
        // 非法的移動
    }

    /**
     * 往右走
     */
    public function goRight()
    {
        echo "<img src='asset/image/cells/five.png'>";
        $this->context->setState($this->context->getCell5State());
    }

    /**
     * 往上走
     */
    public function goUp()
    {
        echo "<img src='asset/image/cells/one.png'>";
        $this->context->setState($this->context->getCell1State());
    }
}