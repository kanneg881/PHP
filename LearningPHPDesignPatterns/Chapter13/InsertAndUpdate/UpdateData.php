<?php
/**
 * Created by PhpStorm.
 * 更新helpDesk資料
 * User: Jackson
 * Date: 2018/1/21
 * Time: 上午2:16
 */

include_once "UniversalConnect.php";

use Chapter13\InsertAndUpdate\UniversalConnect;

class UpdateData
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
        $sql = "UPDATE {$this->table} SET response='$response'
                WHERE chain='$chain'";

        // 查詢失敗
        if ($this->mysqli->query($sql) === false) {
            // %s 是來自參數的字串
            printf("無效的查詢: %s <br> 整個查詢 %s <br>",
                $this->mysqli->error, $sql);
            exit();
        }
        printf("責任鍊查詢: %s <br>服務資訊 %s <br> 已經被改變並設成 %s.",
            $chain, $response, $this->table);

        $this->mysqli->close();
    }
}

new UpdateData();