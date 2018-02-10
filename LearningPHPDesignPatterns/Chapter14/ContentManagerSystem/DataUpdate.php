<?php
/**
 * Created by PhpStorm.
 * 資料更新
 * User: Jackson
 * Date: 2018/1/25
 * Time: 下午11:45
 */

include_once "UniversalConnect.php";

class DataUpdate
{
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 資料庫語法 */
    private $sql;
    /** @var string 資料表 */
    private $table;

    public function __construct()
    {
        $this->table = "ContentManagerSystem";
        $this->mysqli = (new UniversalConnect())->doConnect();

        if ($_POST['data']) {
            /** @var string $data 資料 */
            $data = $this->mysqli->real_escape_string($_POST['data']);
        } else {
            $data = "";
        }

        if (isset($_POST['designPatternUpdate'])) {
            /** @var string $designPatternHeader 設計模式 */
            $designPatternHeader = $this->mysqli->real_escape_string(
                $_POST['designPatternUpdate']);
        } else {
            $designPatternHeader = "";
        }

        /** @var  string $updateField 更新的欄位 */
        $updateField = "textBlock";

        $this->sql = "UPDATE {$this->table} SET $updateField='$data'
                      WHERE designPatternHeader='$designPatternHeader'";

        if (!$this->mysqli->query($this->sql)) {
            echo "更新失敗: " . $this->mysqli->error;
        }
        echo "$updateField 更新為:<br> $data";
    }
}

new DataUpdate();