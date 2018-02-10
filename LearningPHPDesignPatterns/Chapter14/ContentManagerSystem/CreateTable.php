<?php
/**
 * Created by PhpStorm.
 * 新增ContentManagerSystem資料表
 * User: Jackson
 * Date: 2018/1/24
 * Time: 下午10:39
 */

include_once "UniversalConnect.php";

class CreateTable
{
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 資料表 */
    private $table;

    public function __construct()
    {
        $this->mysqli = (new UniversalConnect())->doConnect();
        $this->table = "ContentManagerSystem";

        // 如果資料表存在就刪除
        $drop = "DROP TABLE IF EXISTS $this->table";

        if ($this->mysqli->query($drop) === true) {
            printf("舊資料表 %s 已經被刪除。<br>", $this->table);
        }

        // 創建資料表
        $sql = "CREATE TABLE $this->table (
                  id                      SERIAL,
                  designPatternHeader     NVARCHAR(50),
                  textBlock               TEXT,
                  imageURL                NVARCHAR(60),
                  PRIMARY KEY (id))";

        if ($this->mysqli->query($sql) === true) {
            printf("資料表 $this->table 創建成功。<br>");
        }
        $this->mysqli->close();
    }
}

new CreateTable();