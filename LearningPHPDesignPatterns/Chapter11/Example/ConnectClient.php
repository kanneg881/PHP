<?php
/**
 * Created by PhpStorm.
 * 用戶端連線
 * User: Jackson
 * Date: 2018/1/15
 * Time: 下午1:58
 */

include_once "UniversalConnect.php";

use Chapter11\Example\UniversalConnect;

class ConnectClient
{
    /** @var mysqli 資料庫物件 */
    private $mysqli;

    public function __construct()
    {
        // 所有的連結操作只需要一行程式
        $this->mysqli = (new UniversalConnect)->doConnect();
    }
}

new ConnectClient();