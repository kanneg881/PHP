<?php
/**
 * Created by PhpStorm.
 * 控制狀態改變
 * User: Jackson
 * Date: 2018/1/14
 * Time: 上午1:59
 */

namespace Chapter10\Light;

include_once "BrighterState.php";
include_once "BrightestState.php";
include_once "IState.php";
include_once "OffState.php";
include_once "OnState.php";

use BrighterState;
use BrightestState;
use IState;
use OffState;
use OnState;

class Context
{
    /** @var BrighterState 變得更明亮狀態 */
    private $brighterState;
    /** @var BrightestState 變成最亮 */
    private $brightestState;
    /** @var OffState 目前狀態 */
    private $currentState;
    /** @var OffState 關閉狀態 */
    private $offState;
    /** @var OnState 開啟狀態 */
    private $onState;

    public function __construct()
    {
        $this->brighterState = new BrighterState($this);
        $this->brightestState = new BrightestState($this);
        $this->offState = new OffState($this);
        $this->onState = new OnState($this);

        // 初始狀態是Off
        $this->currentState = $this->offState;
    }

    /**
     * 取得更亮狀態
     *
     * @return BrighterState 更亮狀態
     */
    public function getBrighterState()
    {
        return $this->brighterState;
    }

    /**
     * 取得最亮狀態
     *
     * @return BrightestState 最亮狀態
     */
    public function getBrightestState()
    {
        return $this->brightestState;
    }

    /**
     * 取得關閉狀態
     *
     * @return OffState 關閉狀態
     */
    public function getOffState()
    {
        return $this->offState;
    }

    /**
     * 取得開啟狀態
     *
     * @return OnState 開啟狀態
     */
    public function getOnState()
    {
        return $this->onState;
    }

    /**
     * 設定狀態
     *
     * @param IState $state
     */
    public function setState(IState $state)
    {
        $this->currentState = $state;
    }

    /**
     * 把燈開成更明亮
     */
    public function turnBrighterLight()
    {
        $this->currentState->turnBrighter();
    }

    /**
     * 把燈開成最亮
     */
    public function turnBrightestLight()
    {
        $this->currentState->turnBrightest();
    }

    /**
     * 關燈
     */
    public function turnOffLight()
    {
        $this->currentState->turnLightOff();
    }

    /**
     * 開燈
     */
    public function turnOnLight()
    {
        $this->currentState->turnLightOn();
    }
}