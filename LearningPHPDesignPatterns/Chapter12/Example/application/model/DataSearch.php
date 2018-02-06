<?php
/**
 * Created by PhpStorm.
 * 搜尋資料
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:45
 */

include_once "IStrategy.php";
include_once "../library/UniversalConnect.php";

use Chapter12\Example\IStrategy;
use Chapter12\Example\UniversalConnect;

class DataSearch implements IStrategy
{
    /** @var array 資料包，由HTML表單的資料組成 */
    private $dataPack;
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 資料庫查詢 */
    private $sql;
    /** @var string 資料表 */
    private $table;

    /**
     * 演算法
     *
     * @param array $dataPack 資料包，由HTML表單的資料組成
     */
    public function algorithm(Array $dataPack)
    {
        $this->table = IStrategy::TABLE;
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->dataPack = $dataPack;
        // 欄位
        $field = $this->dataPack[0];
        // 項目
        $term = $this->dataPack[1];
        $this->sql = "SELECT * FROM $this->table WHERE $field='$term'";

        /**
         * MySQL 查詢指令的條件陳述式，輸出資料用
         *
         * @var mysqli_result|boolean $result 查詢結果
         */
        if ($result = $this->mysqli->query($this->sql)) {
            echo "<link rel='stylesheet' href='../../asset/css/survey.css'>";
            echo "<table>";

            /**
             * @var array|null $row 查詢資料
             */
            while ($row = mysqli_fetch_row($result)) {
                echo "<br>";
                echo "<tr>";

                /**
                 * @var string $cell 每筆資料
                 */
                foreach ($row as $cell) {
                    echo "<td>$cell</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            $result->close();
        }
        $this->mysqli->close();
    }
}