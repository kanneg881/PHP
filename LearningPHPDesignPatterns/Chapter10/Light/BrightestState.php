<?php
/**
 * Created by PhpStorm.
 * 實作最亮狀態
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午8:24
 */

include_once "Context.php";
include_once "IState.php";

use Chapter10\Light\Context;

class BrightestState implements IState
{
    /** @var Context Context物件 */
    private $context;

    /**
     * BrightestState 建構子.
     *
     * @param Context $context Context物件
     */
    public function __construct(Context $context)
    {
        $this->context = $context;
    }

    /**
     * 變得更明亮
     */
    public function turnBrighter()
    {
        echo "<img src='asset/images/nada.png'>";
    }

    /**
     * 變成最亮
     */
    public function turnBrightest()
    {
        echo "<img src='asset/images/nada.png'>";
    }

    /**
     * 關燈的狀態
     */
    public function turnLightOff()
    {
        echo "<img src='asset/images/off.jpg'>";
        $this->context->setState($this->context->getOffState());
    }

    /**
     * 開燈的狀態
     */
    public function turnLightOn()
    {
        echo "<img src='asset/images/nada.png'>";
    }
}