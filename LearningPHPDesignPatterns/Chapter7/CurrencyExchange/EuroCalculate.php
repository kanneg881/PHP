<?php
/**
 * Created by PhpStorm.
 * 歐元計算
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午2:18
 */

class EuroCalculate
{
    /** @var float 歐元 */
    private $euro;
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
        $this->euro = $this->productPrice + $this->serviceFee;

        return $this->requestTotal();
    }

    /**
     * 請求總計
     *
     * @return float 總計
     */
    public function requestTotal()
    {
        $this->euro *= $this->rate;

        return $this->euro;
    }
}