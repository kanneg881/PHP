<?php
/**
 * Created by PhpStorm.
 * 格式化協助器
 * User: Jackson
 * Date: 2018/1/22
 * Time: 下午1:18
 */

class FormatHelper
{
    /** @var string html上層 */
    private $bottom;
    /** @var string html下層 */
    private $topper;

    /**
     * 添加html上層
     *
     * @return string html上層
     */
    public function addTop()
    {
        $this->topper = "<!DOCTYPE html><html><head>
        <meta charset='UTF-8'>
        <link rel='stylesheet' type='text/css' href='../asset/css/products.css'>
        <title>地圖工廠</title>
        </head>
        <body>
        <header>飢餓國家</header>";

        return $this->topper;
    }

    /**
     * 關閉html下層
     *
     * @return string html下層
     */
    public function closeUp()
    {
        $this->bottom = "<br><a href='#' target='_blank'>點擊獲得學分</a>";
        $this->bottom .= "</body></html>";

        return $this->bottom;
    }
}