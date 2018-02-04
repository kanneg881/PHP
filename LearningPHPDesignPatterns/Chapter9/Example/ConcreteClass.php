<?php
/**
 * Created by PhpStorm.
 * AbstractClass 具體類別
 * User: Jackson
 * Date: 2018/1/12
 * Time: 上午9:10
 */

include_once "AbstractClass.php";

class ConcreteClass extends AbstractClass
{
    /**
     * 新增標題
     *
     * @param string $caption 標題
     */
    protected function addCaption($caption)
    {
        $this->caption = $caption;
        echo "<em>標題:</em>" . $this->caption . "<br>";
    }

    /**
     * 新增照片
     *
     * @param string $picture 照片
     */
    protected function addPicture($picture)
    {
        $this->picture = $picture;
        $this->picture = "asset/image/" . $picture;
        // 格式化
        $formatter = "<img src=$this->picture><br>";
        echo $formatter;
    }
}