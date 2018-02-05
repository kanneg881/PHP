<?php
/**
 * Created by PhpStorm.
 * 具體狀態實作-打開
 * User: Jackson
 * Date: 2018/1/14
 * Time: 上午9:55
 */

include_once "Context.php";
include_once "IState.php";

use Chapter10\Light\Context;

class OnState implements IState
{
    /** @var Context Context物件 */
    private $context;

    /**
     * OnState 建構子.
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
        echo "<img src='asset/images/brighter.jpg'>";
        $this->context->setState($this->context->getBrighterState());
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
        echo "<img src='asset/images/nada.png'>";
    }
}