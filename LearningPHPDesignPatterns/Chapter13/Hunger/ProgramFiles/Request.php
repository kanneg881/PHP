<?php
/**
 * Created by PhpStorm.
 * 擷取請求
 * User: Jackson
 * Date: 2018/1/22
 * Time: 上午11:30
 */

namespace Chapter13\Hunger;

class Request
{
    /** @var mixed 服務 */
    private $service;

    /**
     * Request 建構子
     *
     * @param mixed $service 服務
     */
    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * 取得目前日期
     *
     * @return array 目前日期
     */
    public function getCurrentDate()
    {
        return $this->service;
    }
}