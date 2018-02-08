<?php
/**
 * Created by PhpStorm.
 * 處理器
 * User: Jackson
 * Date: 2018/1/21
 * Time: 下午3:52
 */

abstract class Handler
{
    /** @var string 處理的物件 */
    protected $service;
    /** @var mysqli 資料庫物件 */
    protected $mysqli;
    /** @var Handler 下一個服務 */
    protected $nextService;
    /** @var string 資料表 */
    protected $table;
    /** @var string 資料庫查詢 */
    protected $sql;

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