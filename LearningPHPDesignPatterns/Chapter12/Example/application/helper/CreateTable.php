<?php
/**
 * Created by PhpStorm.
 * 建立問卷
 * User: Jackson
 * Date: 2018/1/17
 * Time: 下午11:47
 */

namespace Chapter12\Example;

include_once "../library/UniversalConnect.php";

use mysqli;

class CreateTable
{
    /** @var string 資料表 */
    private $table;
    /** @var mysqli 資料庫物件 */
    private $mysqli;

    public function __construct()
    {
        $this->table = "survey";
        $this->mysqli = (new UniversalConnect)->doConnect();

        $drop = "DROP TABLE IF EXISTS $this->table";

        if ($this->mysqli->query($drop) === true) {
            printf("舊資料表 %s 已經被刪除。<br>", $this->table);
        }

        // 創建資料表
        $sql = "CREATE TABLE $this->table (
              id SERIAL,
              company       NVARCHAR(40),
              programmer    NVARCHAR(10),
              language      NVARCHAR(15),
              platform      NVARCHAR(15),
              codingStyle   NVARCHAR(20),
              device        NVARCHAR(10),
              PRIMARY KEY (id))";

        if ($this->mysqli->query($sql) === true) {
            printf("資料表 $this->table 創建成功。<br>");
        }

        $this->mysqli->close();
    }
}

new CreateTable();