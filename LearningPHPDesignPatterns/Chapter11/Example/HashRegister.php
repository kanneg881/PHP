<?php
/**
 * Created by PhpStorm.
 * 註冊頁面
 * User: Jackson
 * Date: 2018/1/15
 * Time: 下午10:18
 */

include_once "UniversalConnect.php";

use Chapter11\Example\UniversalConnect;

class HashRegister
{
    /** @var string 資料表 */
    private $table;
    /** @var mysqli 資料庫物件 */
    private $mysqli;

    public function __construct()
    {
        $this->table = "proxyLog";
        $this->mysqli = (new UniversalConnect)->doConnect();
        // 使用者名稱
        $userName = $this->mysqli->real_escape_string(trim($_POST['userName']));
        // 密碼
        $password = $this->mysqli->real_escape_string(trim($_POST['password']));

        // 插入一筆資料到 proxyLog
        $sql = "INSERT INTO {$this->table} (userName, password) " .
            "VALUES ('$userName', md5('$password'))";

        // 查詢失敗
        if ($this->mysqli->query($sql) === false) {
            printf("無效的查詢: %s <br> 整個查詢 %s <br>",
                $this->mysqli->error, $sql);
            exit();
        }
        echo "註冊成功";
        $this->mysqli->close();
    }
}

new HashRegister();