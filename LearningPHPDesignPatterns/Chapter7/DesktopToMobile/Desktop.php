<?php
/**
 * Created by PhpStorm.
 * IDesktopFormat實作
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午6:29
 */

include_once "IDesktopFormat.php";

class Desktop implements IDesktopFormat
{
    /** @var string html 聲明 和 head開始 */
    private $head = "<!DOCTYPE html><html><head>";
    /** @var string head結束 和 body開始 */
    private $headClose = "<meta charset='UTF-8'><title>桌上型</title></head><body>";
    /** @var string body結束 和 html結束 */
    private $bottom = "</body></html>";
    /** @var string 亂數假文 */
    private $sampleText;

    /**
     * 關閉 HTML
     */
    public function closeHTML()
    {
        echo $this->bottom;
    }

    /**
     * 格式化加入CSS
     */
    public function formatCSS()
    {
        echo $this->head;
        echo "<link rel='stylesheet' href='asset/css/desktop.css'>";
        echo $this->headClose;
        echo "<h1>大家好!</h1>";
    }

    /**
     * 格式化加入圖片
     */
    public function formatGraphics()
    {
        echo "<img class='pixRight' src='asset/image/fallRiver720.jpg' width='720' 
                height='480' alt='river'>";
    }

    /**
     * 水平佈局加入文字
     */
    public function horizontalLayout()
    {
        // 文放檔路徑
        $textFilePath = "asset/other/text/lorem.txt";
        // 打開文字檔資源
        $openText = fopen($textFilePath, 'r');
        // 文字檔內容
        $textContent = fread($openText, filesize($textFilePath));
        // 關閉文字檔資源
        fclose($openText);
        $this->sampleText = $textContent;
        echo "<div>" . $this->sampleText . "</div>";
        echo "<p></p><div>" . $this->sampleText . "</div>";
    }
}