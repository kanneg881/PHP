<?php
/**
 * Created by PhpStorm.
 * 數學類別
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午11:42
 */

class DoMath
{
    /** @var int 總和 */
    private $summary;
    /** @var float 商 */
    private $quotient;

    /**
     * 簡易加法
     *
     * @param int $first 數字1
     * @param int $second 數字2
     * @return int 總和
     */
    public function simpleAdd($first, $second)
    {
        $this->summary = ($first + $second);
        return $this->summary;
    }

    /**
     * 簡易除法
     *
     * @param int $dividend 被除數
     * @param int $divisor 除數
     * @return float|int 商
     */
    public function simpleDivide($dividend, $divisor)
    {
        $this->quotient = ($dividend / $divisor);
        return $this->quotient;
    }
}