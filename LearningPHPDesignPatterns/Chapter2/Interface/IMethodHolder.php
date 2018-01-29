<?php
/**
 * Created by PhpStorm.
 * 抽象介面
 * User: Jackson
 * Date: 2017/12/28
 * Time: 下午11:36
 */

interface IMethodHolder
{
    /**
     * 取得資訊
     *
     * @param mixed $info 資訊
     */
    public function getInfo($info);

    /**
     * 發送資訊
     *
     * @param mixed $info 資訊
     * @return mixed 資訊
     */
    public function sendInfo($info);

    /**
     * 計算兩個數字
     *
     * @param int $first 數字1
     * @param int $second 數字2
     * @return mixed 計算結果
     */
    public function calculate($first, $second);
}