<?php
/**
 * Created by PhpStorm.
 * 日期1
 * User: Jackson
 * Date: 2018/1/22
 * Time: 上午11:37
 */

include_once "ConcreteProduct1.php";
include_once "Handler.php";
include_once "HungerFactory.php";

use Chapter13\Hunger\Handler;
use Chapter13\Hunger\Request;

class Date1 extends Handler
{
    /**
     * 處理請求具體產品
     *
     * @param Request $request Request物件
     */
    public function handleRequest(Request $request)
    {
        /** @var array $currentDate 今天日期 */
        $currentDate = $request->getCurrentDate();

        $this->currentDay = intval($currentDate['mday']);
        $this->currentMonth = intval($currentDate['mon']);

        $this->checkHandle = ($this->currentMonth == 1 && $this->currentDay >= 15) &&
            ($this->currentMonth == 1 && $this->currentDay <= 22);

        if ($this->checkHandle) {
            $this->hungerFactory = new HungerFactory();
            echo $this->hungerFactory->feedbackFactory(new ConcreteProduct1());
        } elseif ($this->nextService != null) {
            $this->nextService->handleRequest($request);
        } else {
            echo "沒有資料了";
        }
    }

    /**
     * 設定下一個服務，如果此服務沒辦法處理就處理下一個服務
     *
     * @param Handler $nextService 下一個服務
     */
    public function setNextService($nextService)
    {
        $this->nextService = $nextService;
    }
}