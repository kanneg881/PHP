<?php
/**
 * Created by PhpStorm.
 * 策略模式介面
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:44
 */

namespace Chapter12\Example;

interface IStrategy
{
    /** 資料庫資料表 */
    const TABLE = "survey";

    /**
     * 演算法
     *
     * @param array $dataPack 資料包，由HTML表單的資料組成
     */
    public function algorithm(Array $dataPack);
}