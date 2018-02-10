<?php
/**
 * Created by PhpStorm.
 * 具體訂閱
 * User: Jackson
 * Date: 2018/1/26
 * Time: 下午7:55
 */

include_once "Subject.php";
include_once "UniversalConnect.php";

class ConcreteSubject extends Subject
{
    /** @var string 設計模式 */
    private $designPattern;
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var array 狀態 */
    private $state = array();
    /** @var string 資料表 */
    private $table;

    /**
     * 取得狀態
     *
     * @return mixed 狀態
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * 設定狀態
     *
     * @param string $designPattern 設計模式
     */
    public function setState($designPattern)
    {
        $this->designPattern = strtolower($designPattern);
        $this->mysqli = (new UniversalConnect())->doConnect();
        $this->table = "ContentManagerSystem";

        // 建立查詢陳述式
        $sql = "SELECT * FROM {$this->table} 
                WHERE designPatternHeader='$this->designPattern'";

        // 由MySQL 表格將合適的資料加到 $stateSet 陣列
        if ($result = $this->mysqli->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $this->state[0] = $row["designPatternHeader"];
                $this->state[1] = $row["textBlock"];
                $this->state[2] = $row["imageURL"];
            }
            $result->close();
        }
        $this->mysqli->close();

        /**
         * update() 方法是 notify() 的一部份
         * 在 Subject 中實作為具體方法
         */
        $this->notify();
    }
}