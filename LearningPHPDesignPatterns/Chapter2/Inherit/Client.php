<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2017/12/30
 * Time: 下午12:34
 */

include_once "Dogs.php";
include_once "Cats.php";

class Client
{
    function __construct()
    {
        // 狗物件
        $dogs = new Dogs();
        // 貓咪物件
        $cats = new Cats();
    }
}

$worker = new Client();