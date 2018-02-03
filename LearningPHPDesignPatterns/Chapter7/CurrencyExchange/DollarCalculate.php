<?php
/**
 * Created by PhpStorm.
 * 美金計算
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午2:18
 */

class DollarCalculate
{
    /** @var float 美金 */
    private $dollar;
    /** @var int 產品價格 */
    private $productPrice;
    /** @var int 服務費 */
    private $serviceFee;
    /** @var int 匯率 */
    public $rate = 1;

    /**
     * 請求計算
     *
     * @param int $productPrice 產品價格
     * @param int $serviceFee 服務費
     * @return float 總計
     */
    public function requestCalculate($productPrice, $serviceFee)
    {
        $this->productPrice = $productPrice;
        $this->serviceFee = $serviceFee;
        $this->dollar = $this->productPrice + $this->serviceFee;

        return $this->requestTotal();
    }

    /**
     * 請求總計
     *
     * @return float 總計
     */
    public function requestTotal()
    {
        $this->dollar *= $this->rate;

        return $this->dollar;
    }
}