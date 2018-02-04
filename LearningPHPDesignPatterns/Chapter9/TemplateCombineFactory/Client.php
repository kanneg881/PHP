<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:26
 */

namespace Chapter9\TemplateCombineFactory;

include_once "TemplateFactory.php";

use TemplateFactory;

class Client
{
    function __construct()
    {
        // 莫迪利亞物件
        $modigliani = new TemplateFactory();
        $modigliani->templateMethod();
    }
}

new Client();