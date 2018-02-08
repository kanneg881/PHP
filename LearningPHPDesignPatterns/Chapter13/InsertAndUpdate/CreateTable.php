<?php
/**
 * Created by PhpStorm.
 * 新增helpDesk資料表
 * User: Jackson
 * Date: 2018/1/20
 * Time: 下午10:23
 */

namespace Chapter13\InsertAndUpdate;

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
        $this->table = "helpDesk";
        $this->mysqli = (new UniversalConnect())->doConnect();

        // 如果資料表存在就刪除
        $drop = "DROP TABLE IF EXISTS $this->table";

        if ($this->mysqli->query($drop) === true) {
            printf("舊資料表 %s 已經被刪除。<br>", $this->table);
        }

        // 創建資料表
        $sql = "CREATE TABLE $this->table (id INT NOT NULL AUTO_INCREMENT,
                chain VARCHAR(7), response TEXT, PRIMARY KEY (id))";

        if ($this->mysqli->query($sql) === true) {
            printf("資料表 $this->table 創建成功。<br>");
        }
        $this->mysqli->close();
    }
}

new CreateTable();