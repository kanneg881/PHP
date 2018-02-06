<?php
/**
 * Created by PhpStorm.
 * 刪除紀錄
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:47
 */

include_once "IStrategy.php";
include_once "../library/UniversalConnect.php";

use Chapter12\Example\IStrategy;
use Chapter12\Example\UniversalConnect;

class DataDelete implements IStrategy
{
    /** @var string 資料表 */
    private $table;
    /** @var array 資料包，由HTML表單的資料組成 */
    private $dataPack;
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 資料庫查詢 */
    private $sql;

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
        // 要刪除的ID
        $id = $this->dataPack[0];
        $id = intval($id);

        $this->sql = "DELETE FROM {$this->table} WHERE id='$id'";

        /**
         * 在MySQL 查詢中的條件陳述式，用來檢查錯誤
         *
         * @var mysqli_result|boolean $result 查詢結果
         */
        if ($result = $this->mysqli->query($this->sql)) {
            echo "紀錄 #$id 從資料表移除: $this->table";
        } else {
            echo "更改失敗: " . $this->mysqli->error;
        }
        $this->mysqli->close();
    }
}