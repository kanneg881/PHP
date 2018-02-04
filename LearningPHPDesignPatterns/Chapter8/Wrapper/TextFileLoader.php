<?php
/**
 * Created by PhpStorm.
 * 內建封裝器
 * User: Jackson
 * Date: 2018/1/9
 * Time: 上午9:27
 */

class TextFileLoader
{
    /** @var bool|string 文字檔 */
    private $text;

    public function __construct()
    {
        // 取得文字檔內容
        $this->text = file_get_contents("celery.txt");
        echo $this->text;
    }
}

new TextFileLoader();