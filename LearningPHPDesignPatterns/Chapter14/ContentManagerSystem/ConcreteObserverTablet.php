<?php
/**
 * Created by PhpStorm.
 * 平板具體觀察者
 * User: Jackson
 * Date: 2018/1/27
 * Time: 上午1:30
 */

include_once "Observer.php";

class ConcreteObserverTablet implements Observer
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
        $page = <<<TABLET
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>平板頁面</title>
    <link rel="stylesheet" type="text/css" href="asset/css/tablet.css"/>
</head>
<body>
    <article>
        <header>
            <h1>$this->designPatternHeader</h1>
        </header>
        <section>
            <img src="asset/image/tablet/$this->imageURL" alt="圖片網址">
            <p>$this->textBlock</p>
        </section>
    </article>
</body>
</html>
TABLET;
        echo $page;
    }
}