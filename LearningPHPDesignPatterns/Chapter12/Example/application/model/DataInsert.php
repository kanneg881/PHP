<?php
/**
 * Created by PhpStorm.
 * 寫入資料
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:42
 */

namespace Chapter12\Example;

include_once "IStrategy.php";

use mysqli;
use mysqli_result;

class DataInsert implements IStrategy
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
        $this->dataPack = $dataPack;
        // 公司
        $company = $this->dataPack[0];
        // 編程人員
        $programmer = $this->dataPack[1];
        // 程式語言
        $language = $this->dataPack[2];
        // 平台
        $platform = $this->dataPack[3];
        // 編程風格
        $codingStyle = $this->dataPack[4];
        // 設備
        $device = $this->dataPack[5];
        $this->table = IStrategy::TABLE;
        $this->mysqli = (new UniversalConnect)->doConnect();
        // 插入一筆資料
        $this->sql = "INSERT INTO {$this->table}
        (
          company,
          programmer,
          language,
          platform,
          codingStyle,
          device
        )
        VALUES 
        (
          '$company',
          '$programmer',
          '$language',
          '$platform',
          '$codingStyle',
          '$device'
        )";

        /** @var mysqli_result|boolean $result 查詢結果 */
        if (($result = $this->mysqli->query($this->sql)) === false) {
            printf("無效的查詢: %s <br> 整段查詢: %s <br>", $this->mysqli->error,
                $this->sql);
            exit();
        }
        printf("成功輸入資料到資料表: $this->table <br>");

        $this->mysqli->close();
    }
}