<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午9:07
 */

namespace Chapter5;

include_once "GraphicFactory.php";
include_once "TextFactory.php";

class Client
{
    /** @var GraphicFactory 圖形物件 */
    private $someGraphicObject;
    /** @var TextFactory 文字物件 */
    private $someTextObject;

    public function __construct()
    {
        $this->someGraphicObject = new GraphicFactory();
        echo $this->someGraphicObject->startFactory();
        $this->someTextObject = new TextFactory();
        echo $this->someTextObject->startFactory();
    }
}

new Client();