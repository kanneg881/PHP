<?php
/**
 * Created by PhpStorm.
 * 複製品範例
 * User: Jackson
 * Date: 2018/1/5
 * Time: 下午9:56
 */

class HelloClone
{
    /** @var string 在建構子設值 */
    private $builtInConstructor;

    public function __construct()
    {
        echo "你好, 原始!<br>";
        $this->builtInConstructor = "構造函式的創建<br>";
    }

    /**
     * 工作
     */
    public function doWork()
    {
        echo $this->builtInConstructor;
        echo "我正在工作!<p>";
    }
}

// 原始物件
$original = new HelloClone();
$original->doWork();

/**
 * 複製物件
 * 複製品不會重新執行建構函式
 */
$cloneIt = clone $original;
$cloneIt->doWork();