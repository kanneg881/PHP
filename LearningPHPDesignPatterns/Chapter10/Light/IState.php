<?php
/**
 * Created by PhpStorm.
 * 狀態介面
 * User: Jackson
 * Date: 2018/1/14
 * Time: 上午9:53
 */

interface IState
{
    /**
     * 變得更明亮
     */
    public function turnBrighter();

    /**
     * 變成最亮
     */
    public function turnBrightest();

    /**
     * 關燈的狀態
     */
    public function turnLightOff();

    /**
     * 開燈的狀態
     */
    public function turnLightOn();
}