<?php
/**
 * Created by PhpStorm.
 * 格式化協助器
 * User: Jackson
 * Date: 2018/1/4
 * Time: 上午9:08
 */

namespace Chapter5\NewFactory;

class FormatHelper
{
    /** @var string html上層 */
    private $top;
    /** @var string html下層 */
    private $bottom;

    /**
     * 添加html上層
     *
     * @return string html上層
     */
    public function addTop()
    {
        $this->top = "<!DOCTYPE html>
        <html>
        <head>
        <link rel='stylesheet' type='text/css' href='products.css'/>
        <meta charset='UTF-8'>
        <title>Map Factory</title>
        </head>
        <body>";

        return $this->top;
    }

    /**
     * 關閉下層html
     *
     * @return string html下層
     */
    public function closeUp()
    {
        $this->bottom = "</body></html>";
        return $this->bottom;
    }
}