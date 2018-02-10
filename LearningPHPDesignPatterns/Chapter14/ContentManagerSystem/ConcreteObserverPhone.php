<?php
/**
 * Created by PhpStorm.
 * 手機具體觀察者
 * User: Jackson
 * Date: 2018/1/26
 * Time: 下午11:21
 */

include_once "Observer.php";

class ConcreteObserverPhone implements Observer
{
    /** @var string 設計模式標題 */
    private $designPatternHeader;
    /** @var string 圖片網址 */
    private $imageURL;
    /** @var array 狀態 */
    private $state = array();
    /** @var string 主要訊息 */
    private $textBlock;

    /**
     * 從訂閱接收更新
     *
     * @param Subject $subject 訂閱
     */
    function update(Subject $subject)
    {
        /** @var string $getState ConcreteSubject getState() */
        $getState = "getState";
        $this->state = $subject->$getState();
        $this->designPatternHeader = $this->state[0];
        $this->textBlock = $this->state[1];
        $this->imageURL = $this->state[2];
        $this->getPage();
    }

    /**
     * 取得頁面
     */
    private function getPage()
    {
        /**
         * 頁面
         * Heredoc 語法
         */
        $page = <<<MOBILE
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>手機頁面</title>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"/>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>
    <div data-role="page">
        <div data-role="header">
            <h1>$this->designPatternHeader</h1>
        </div>
        <div data-role="content">
            <p>$this->textBlock</p>
            <img src="asset/image/mobile/$this->imageURL" alt="image urls" width="100%">
        </div>
    </div>
</body>
</html>
MOBILE;
        echo $page;
    }
}