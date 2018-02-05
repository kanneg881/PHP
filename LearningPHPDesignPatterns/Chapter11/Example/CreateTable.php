<?php
/**
 * Created by PhpStorm.
 * 設置登入註冊
 * User: Jackson
 * Date: 2018/1/15
 * Time: 下午6:09
 */

namespace Chapter11\Example;

include_once "UniversalConnect.php";

use mysqli;

class CreateTable
{
    /** @var string 資料表 */
    private $table;
    /** @var mysqli 資料庫物件 */
    private $mysqli;

    public function __construct()
    {
        $this->table = "proxyLog";
        $this->mysqli = (new UniversalConnect)->doConnect();

        // 如果資料表存在就刪除
        $drop = "DROP TABLE IF EXISTS $this->table";

        if ($this->mysqli->query($drop) === true) {
            printf("舊資料表 %s 已經被刪除.<br>", $this->table);
        }

        // 創建資料表
        $sql = "CREATE TABLE $this->table (userName NVARCHAR(15), password NVARCHAR(120))";

        if ($this->mysqli->query($sql) === true) {
            echo "資料表 $this->table 創建成功。<br>";
        }
        $this->mysqli->close();
    }
}

new CreateTable();