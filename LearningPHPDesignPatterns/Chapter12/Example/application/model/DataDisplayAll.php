<?php
/**
 * Created by PhpStorm.
 * 顯示資料
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:48
 */

include_once "IStrategy.php";
include_once "../library/UniversalConnect.php";

use Chapter12\Example\IStrategy;
use Chapter12\Example\UniversalConnect;

class DataDisplayAll implements IStrategy
{
    /** @var mysqli 資料庫物件 */
    private $mysqli;
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

        // 建立查詢陳述式
        $sql = "SELECT * FROM $this->table";

        /**
         * MySQL 指令中的條件陳述式
         *
         * @var mysqli_result|boolean $result 查詢結果
         */
        if ($result = $this->mysqli->query($sql)) {
            printf("選擇回傳 %d 筆。<p></p>", $result->num_rows);

            echo "<link rel='stylesheet' href='../../asset/css/survey.css'>";
            echo "<table>";
            echo "<tr>";

            /**
             * @var object|bool $field 資料庫欄位
             */
            while ($field = mysqli_fetch_field($result)) {
                echo "<th>&nbsp;{$field->name}</th>";
            }
            echo "</tr>";

            /**
             * @var array|null $row 查詢資料
             */
            while ($row = mysqli_fetch_row($result)) {
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