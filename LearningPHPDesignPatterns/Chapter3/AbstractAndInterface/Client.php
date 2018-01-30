<?php
/**
 * Created by PhpStorm.
 * 客戶端
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午12:58
 */

include_once "NorthRegion.php";
include_once "WestRegion.php";

class Client
{
    public function __construct()
    {
        // 北部地區物件
        $north = new NorthRegion();
        // 西部地區物件
        $west = new WestRegion();
        $this->showInterface($north);
        $this->showInterface($west);
    }

    /**
     * 呼叫抽象類別方法
     *
     * @param IAbstract $region 區域
     */
    private function showInterface(IAbstract $region)
    {
        echo $region->displayShow() . "<br>";
    }
}

$worker = new Client();