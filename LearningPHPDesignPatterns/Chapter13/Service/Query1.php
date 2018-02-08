<?php
/**
 * Created by PhpStorm.
 * 詢問1
 * User: Jackson
 * Date: 2018/1/21
 * Time: 下午3:59
 */

include_once "Handler.php";
include_once "UniversalConnect.php";

use Chapter13\Service\UniversalConnect;

class Query1 extends Handler
{
    /**
     * 處理請求具體產品
     *
     * @param Request $request Request物件
     */
    public function handleRequest(Request $request)
    {
        $this->service = "query1";

        if ($request->getService() == $this->service) {
            $this->table = "helpDesk";
            $this->mysqli = (new UniversalConnect())->doConnect();
            // 資料庫欄位
            $column = "response";
            $this->sql = "SELECT $column FROM {$this->table}
                          WHERE chain='$this->service'";

            if ($result = $this->mysqli->query($this->sql)) {
                $row = $result->fetch_assoc();
                echo $row['response'];
            }
            $this->mysqli->close();
        } elseif ($this->nextService != null) {
            $this->nextService->handleRequest($request);
        } else {
            echo "查無資料";
        }
    }

    /**
     * 設定下一個服務，如果此服務沒辦法處理就處理下一個服務
     *
     * @param object $nextService 下一個服務
     */
    public function setNextService($nextService)
    {
        $this->nextService = $nextService;
    }
}

