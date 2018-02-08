<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/22
 * Time: 上午12:41
 */

namespace Chapter13\Hunger;

include_once "Date1.php";
include_once "Request.php";

use Date1;

class Client
{
    /** @var array 目前日期 */
    private $currentDate;

    public function __construct()
    {
        /**
         * 根據所選的時區來取得日期
         * @link http://php.net/manual/en/timezones.php
         */
        $timezone = 'America/New_York';
        // 設定時區
        date_default_timezone_set($timezone);
        $this->currentDate = getdate();

        $date1 = new Date1();

        // 可以練習自己增加看看
//        $date2 = new Date2();
//        $date3 = new Date3();
//        $date4 = new Date4();
//        $date5 = new Date5();
//        $date6 = new Date6();
//        $date7 = new Date7();
//        $date8 = new Date8();
//        $date9 = new Date9();
//        $date10 = new Date10();
//        $date11 = new Date11();
//        $date12 = new Date12();
//        $date13 = new Date13();
//        $date14 = new Date14();
//        $date15 = new Date15();

//        $date1->setNextService($date2);
//        $date2->setNextService($date3);
//        $date3->setNextService($date4);
//        $date4->setNextService($date5);
//        $date5->setNextService($date6);
//        $date6->setNextService($date7);
//        $date7->setNextService($date8);
//        $date8->setNextService($date9);
//        $date9->setNextService($date10);
//        $date10->setNextService($date11);
//        $date11->setNextService($date12);
//        $date12->setNextService($date13);
//        $date13->setNextService($date14);
//        $date14->setNextService($date15);

        // 產生載入請求並且加以處理
        $request = new Request($this->currentDate);
        $date1->handleRequest($request);
    }
}