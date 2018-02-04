<?php
/**
 * Created by PhpStorm.
 * 具體 ITemplate
 * 呼叫 Factory Method
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:30
 */

include_once "GraphicFactory.php";
include_once "ITemplate.php";
include_once "TextFactory.php";

class TemplateFactory extends ITemplate
{
    /**
     * 新增標題
     */
    protected function addCaption()
    {
        $this->caption = new TextFactory();
        echo $this->caption->doFactory();
    }

    /**
     * 新增照片
     */
    protected function addPicture()
    {
        $this->picture = new GraphicFactory();
        echo $this->picture->doFactory();
    }
}