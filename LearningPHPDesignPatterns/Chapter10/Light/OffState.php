<?php
/**
 * Created by PhpStorm.
 * 具體狀態實作-關閉
 * User: Jackson
 * Date: 2018/1/14
 * Time: 上午9:59
 */

include_once "Context.php";
include_once "IState.php";

use Chapter10\Light\Context;

class OffState implements IState
{
    /** @var Context Context物件 */
    private $context;

    /**
     * OffState 建構子.
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
        echo "<img src='asset/images/nada.png'>";
    }

    /**
     * 開燈的狀態
     */
    public function turnLightOn()
    {
        echo "<img src='asset/images/on.png'>";
        $this->context->setState($this->context->getOnState());
    }
}