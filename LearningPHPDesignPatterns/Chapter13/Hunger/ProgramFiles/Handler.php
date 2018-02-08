<?php
/**
 * Created by PhpStorm.
 * 處理器介面
 * User: Jackson
 * Date: 2018/1/22
 * Time: 上午11:32
 */

namespace Chapter13\Hunger;

use HungerFactory;

abstract class Handler
{
    /** @var bool 是否可以處理，來自一個使用日期範圍的布林表達式 */
    protected $checkHandle;
    /** @var int 當前日期 */
    protected $currentDay;
    /** @var int 當前月份 */
    protected $currentMonth;
    /** @var HungerFactory HungerFactory物件 */
    protected $hungerFactory;
    /** @var Handler 下一個服務 */
    protected $nextService;

    /**
     * 處理請求具體產品
     *
     * @param Request $request Request物件
     */
    abstract public function handleRequest(Request $request);

    /**
     * 設定下一個服務，如果此服務沒辦法處理就處理下一個服務
     *
     * @param object $nextService 下一個服務
     */
    abstract public function setNextService($nextService);
}