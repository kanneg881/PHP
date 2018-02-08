<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/21
 * Time: 下午2:42
 */

namespace Chapter13\Service;

include_once "Query1.php";
include_once "Query2.php";
include_once "Query3.php";
include_once "Query4.php";
include_once "Query5.php";
include_once "Request.php";

use Query1;
use Query2;
use Query3;
use Query4;
use Query5;
use Request;

class Client
{
    /** @var string 詢問 */
    private $query;

    public function __construct()
    {
        if (isset($_POST['send'])) {
            $this->query = $_POST['help'];
        }
        // 詢問1
        $query1 = new Query1();
        // 詢問2
        $query2 = new Query2();
        // 詢問3
        $query3 = new Query3();
        // 詢問4
        $query4 = new Query4();
        // 詢問5
        $query5 = new Query5();

        $query1->setNextService($query2);
        $query2->setNextService($query3);
        $query3->setNextService($query4);
        $query4->setNextService($query5);

        // 產生與處理載入請求
        $request = new Request($this->query);
        // 設定鏈結的開始
        $query1->handleRequest($request);
    }
}

new Client();