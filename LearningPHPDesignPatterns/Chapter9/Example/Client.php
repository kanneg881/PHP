<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/1/12
 * Time: 上午9:22
 */

namespace Chapter9\example;

include_once "ConcreteClass.php";

use ConcreteClass;

class Client
{
    function __construct()
    {
        // 標題
        $caption = "莫迪利亞尼畫了拉長的臉。";
        // 莫迪利亞物件
        $modigliani = new ConcreteClass();
        $modigliani->templateMethod("modigliani.jpg", $caption);
    }
}

new Client();