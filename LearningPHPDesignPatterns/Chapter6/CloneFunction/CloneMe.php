<?php
/**
 * Created by PhpStorm.
 * 複製功能範例
 * User: Jackson
 * Date: 2018/1/4
 * Time: 下午11:15
 */

abstract class CloneMe
{
    /** @var string 名字 */
    public $name;
    /** @var string html img圖片 */
    public $picture;

    /**
     * 克隆魔術方法
     */
    abstract function __clone();
}

class Person extends CloneMe
{
    public function __construct()
    {
        $this->picture = "asset/image/cloneMan.jpg";
        $this->name = "原始的";
    }

    /**
     * 顯示
     */
    public function display()
    {
        echo "<img src='$this->picture'>";
        echo "<br>$this->name <p>";
    }

    /**
     * 克隆魔術方法
     */
    function __clone()
    {
    }
}

// 個人物件
$worker = new Person();
$worker->display();

// 偷懶複製
$slacker = clone $worker;
$slacker->name = "克隆體";
$slacker->display();