<?php
/**
 * Created by PhpStorm.
 * 抽象樣板
 * User: Jackson
 * Date: 2018/1/13
 * Time: 上午12:28
 */

abstract class ITemplate
{
    /** @var string 標題 */
    protected $caption;
    /** @var string 照片 */
    protected $picture;

    /**
     * 新增標題
     */
    protected abstract function addCaption();

    /**
     * 新增照片
     */
    protected abstract function addPicture();

    /**
     * 樣板函式
     */
    public function templateMethod()
    {
        $this->addPicture();
        $this->addCaption();
    }
}