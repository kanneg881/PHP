<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午7:28
 */

namespace Chapter10\Light;

include_once "Context.php";

class Client
{
    /** @var Context Context物件 */
    private $context;

    public function __construct()
    {
        echo "<link rel='stylesheet' type='text/css' href='asset/css/light.css'>";
        $this->context = new Context();
        $this->context->turnOnLight();
        $this->context->turnBrighterLight();
        $this->context->turnBrightestLight();
        $this->context->turnOffLight();
        $this->context->turnBrightestLight();
    }
}

new Client();