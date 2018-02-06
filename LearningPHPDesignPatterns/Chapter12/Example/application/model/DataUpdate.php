<?php
/**
 * Created by PhpStorm.
 * 更新資料
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:46
 */

namespace Chapter12\Example;

include_once "IStrategy.php";
include_once "../library/UniversalConnect.php";

use mysqli;
use mysqli_result;

class DataUpdate implements IStrategy
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
        // 改變的欄位
        $changeField = $this->dataPack[0];
        // 舊資料
        $oldData = $this->dataPack[1];
        // 新資料
        $newData = $this->dataPack[2];
        $this->sql = "UPDATE $this->table SET $changeField='$newData'
                      WHERE $changeField='$oldData'";

        /**
         * 在MySQL 查詢中的條件陳述式，用來檢查錯誤
         *
         * @var mysqli_result|boolean $result 查詢結果
         */
        if ($result = $this->mysqli->query($this->sql)) {
            echo "$changeField 改變資料 $oldData 為: $newData";
        } else {
            echo "更改失敗: " . $this->mysqli->error;
        }
        $this->mysqli->close();
    }
}