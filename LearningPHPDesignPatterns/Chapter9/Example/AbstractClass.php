<?php
/**
 * Created by PhpStorm.
 * 樣板方法設計模式抽象類別
 * User: Jackson
 * Date: 2018/1/12
 * Time: 上午9:04
 */

abstract class AbstractClass
{
    /** @var string 標題 */
    protected $caption;
    /** @var string 照片 */
    protected $picture;

    /**
     * 新增標題
     *
     * @param string $caption 標題
     */
    abstract protected function addCaption($caption);

    /**
     * 新增照片
     *
     * @param string $picture 照片
     */
    abstract protected function addPicture($picture);

    /**
     * 樣板函式
     *
     * @param string $picture 照片
     * @param string $caption 標題
     */
    public function templateMethod($picture, $caption)
    {
        $this->picture = $picture;
        $this->caption = $caption;
        $this->addPicture($this->picture);
        $this->addCaption($this->caption);
    }
}