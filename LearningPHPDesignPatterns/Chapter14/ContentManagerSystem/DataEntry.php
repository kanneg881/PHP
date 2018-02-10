<?php
/**
 * Created by PhpStorm.
 * 資料輸入
 * User: Jackson
 * Date: 2018/1/25
 * Time: 下午11:20
 */

include_once "UniversalConnect.php";

class DataEntry
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

        if ($_POST['designPatternHeader']) {
            /** @var string $designPatternHeader 設計模式標題 */
            $designPatternHeader = $this->mysqli->real_escape_string(
                $_POST['designPatternHeader']);
        } else {
            $designPatternHeader = "";
        }

        if ($_POST['textBlock']) {
            /** @var string $textBlock 文字區塊 */
            $textBlock = $this->mysqli->real_escape_string($_POST['textBlock']);
        } else {
            $textBlock = "";
        }

        if ($_POST['imageURL']) {
            /** @var string $imageURL 圖片網址 */
            $imageURL = $this->mysqli->real_escape_string($_POST['imageURL']);
        } else {
            $imageURL = "";
        }
        $this->sql = "INSERT INTO {$this->table}
                      (designPatternHeader,textBlock,imageURL) VALUES 
                      ('$designPatternHeader','$textBlock','$imageURL')";

        // 查詢失敗
        if ($this->mysqli->query($this->sql) === false) {
            printf("無效的查詢: %s <br> 整個查詢 %s <br>",
                $this->mysqli->error, $this->sql);
        }
        printf("成功將資料輸入到資料表: $this->table <br>");

        $this->mysqli->close();
    }
}

new DataEntry();