<?php
/**
 * Created by PhpStorm.
 * 實作 IConnectInfo
 * User: Jackson
 * Date: 2017/12/29
 * Time: 上午8:49
 */

include_once "IConnectInfo.php";

use Chapter2\IConnectInfo;

class ConSQL implements IConnectInfo
{
    //使用範圍解析運算子傳遞常數
    /** @var string 伺服器 */
    private $server = IConnectInfo::HOST;
    /** @var string 目前的資料庫 */
    private $currentDB = IConnectInfo::DBNAME;
    /** @var string 使用者 */
    private $user = IConnectInfo::UNAME;
    /** @var string 密碼 */
    private $pass = IConnectInfo::PW;

    /**
     * 測試連線
     */
    function testConnection()
    {
        // 資料庫連線
        $hookup = new mysqli($this->server, $this->user, $this->pass, $this->currentDB);

        // 如果連線失敗
        if (mysqli_connect_error()) {
            die('連線失敗');
        }

        print "你迷上了Ace! <br>" . $hookup->host_info;

        // 關閉資料庫
        $hookup->close();
    }
}

$useConstant = new ConSQL();
$useConstant->testConnection();