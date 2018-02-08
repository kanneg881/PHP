<?php
/**
 * Created by PhpStorm.
 * 輸入資料到helpDesk
 * User: Jackson
 * Date: 2018/1/21
 * Time: 上午1:34
 */

include_once "UniversalConnect.php";

use Chapter13\InsertAndUpdate\UniversalConnect;

class InsertData
{
    /** @var string 資料表 */
    private $table;
    /** @var mysqli 資料庫物件 */
    private $mysqli;

    public function __construct()
    {
        $this->table = "helpDesk";
        $this->mysqli = (new UniversalConnect())->doConnect();
        // 查詢鏈值
        $chain = $this->mysqli->real_escape_string($_POST['chain']);
        // 服務資訊
        $response = $this->mysqli->real_escape_string($_POST['response']);

        // 插入一筆資料
        $sql = "INSERT INTO {$this->table} (chain,response) VALUES 
                ('$chain','$response')";

        // 查詢失敗
        if ($this->mysqli->query($sql) === false) {
            // %s 是來自參數的字串
            printf("無效的查詢: %s <br> 整個查詢 %s <br>",
                $this->mysqli->error, $sql);
            exit();
        }
        printf("責任鍊查詢: %s <br>服務資訊 %s <br> 已經被插入到 %s.",
            $chain, $response, $this->table);

        $this->mysqli->close();
    }
}

new InsertData();