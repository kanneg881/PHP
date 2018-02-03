<?php
/**
 * Created by PhpStorm.
 * IMobileFormat實作
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午9:38
 */

include_once "IMobileFormat.php";

class Mobile implements IMobileFormat
{
    /** @var string html 聲明 和 head開始 */
    private $head = "<!DOCTYPE html><html><head>";
    /** @var string head結束 和 body開始 */
    private $headClose = "<meta charset='UTF-8'><title>Mobile</title></head><body>";
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
        echo "<link rel='stylesheet' href='asset/css/mobile.css'>";
        echo $this->headClose;
        echo "<h1>Hello, Everyone!</h1>";
    }

    /**
     * 格式化加入圖片
     */
    public function formatGraphics()
    {
        echo "<img src='asset/image/fallRiver960.jpg' width=device-width height=device-height alt='river'>";

    }

    /**
     * 垂直佈局加入文字
     */
    public function verticalLayout()
    {
        // 文放檔路徑
        $textFile = "asset/other/text/lorem.txt";
        // 打開文字檔資源
        $openText = fopen($textFile, 'r');
        // 文字檔內容
        $textContent = fread($openText, filesize($textFile));
        // 關閉文字檔資源
        fclose($openText);
        $this->sampleText = $textContent;
        echo "<p><div>" . $this->sampleText . "</div>";
        echo "<p><div>" . $this->sampleText . "</div>";
    }
}
