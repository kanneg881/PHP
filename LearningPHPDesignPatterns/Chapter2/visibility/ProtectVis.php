<?php
/**
 * Created by PhpStorm.
 * 受保護範例
 * User: Jackson
 * Date: 2017/12/30
 * Time: 上午2:33
 */

abstract class ProtectVis
{
    /**
     * 計算金錢
     */
    abstract protected function countMoney();

    /** @var int 工資 */
    protected $wage;

    /**
     * 設置每小時工資
     *
     * @param int $hourly 每小時工資
     * @return mixed 每小時工資
     */
    protected function setHourly($hourly)
    {
        // 每小時工資
        $money = $hourly;
        return $money;
    }
}