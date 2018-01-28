<?php
/**
 * Created by PhpStorm.
 * MobileSniffer.php 客戶端
 * User: Jackson
 * Date: 2017/12/27
 * Time: 下午1:36
 */

// 確保錯誤輸出
ini_set("display_errors", "1");
error_reporting(E_ALL);

include_once "MobileSniffer.php";

class Client
{
    /** @var MobileSniffer MobileSniffer 物件  */
    private $mobileSniffer;

    public function __construct()
    {
        $this->mobileSniffer = new MobileSniffer();
        echo "設備 = " . $this->mobileSniffer->findDevice() . "<br>";
        echo "瀏覽器 = " . $this->mobileSniffer->findBrowser() . "<br>";
    }
}

$client = new Client();