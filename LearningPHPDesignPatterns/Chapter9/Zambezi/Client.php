<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/13
 * Time: 下午10:51
 */

namespace Chapter9\Zambezi;

include_once "ZambeziCalculate.php";

use ZambeziCalculate;

class Client
{
    /** @var int 購買的總計 */
    private $buyTotal;
    /** @var int 選購的GPS */
    private $gps;
    /** @var array 選購的地圖 */
    private $maps;
    /** @var int 選購的船 */
    private $boat;
    /** @var bool 免運費 */
    private $freeShipping;
    /** @var ZambeziCalculate ZambeziCalculate 物件 */
    private $zambeziCalculate;

    function __construct()
    {
        $this->setPurchased();
        $this->setCost();
        $this->zambeziCalculate = new ZambeziCalculate();
        $this->zambeziCalculate->templateMethod($this->buyTotal, $this->freeShipping);
    }

    /**
     * 設定花費
     */
    private function setCost()
    {
        $this->buyTotal = $this->gps;

        foreach ($this->maps as $value) {
            $this->buyTotal += $value;
        }

        // 布林值
        $this->freeShipping = ($this->buyTotal >= 200);
        $this->buyTotal += $this->boat;
    }

    /**
     * 設定所有商品
     */
    private function setPurchased()
    {
        $this->gps = $_POST['gps'];
        $this->maps = $_POST['maps'];
        $this->boat = $_POST['boat'];
    }
}

new Client();