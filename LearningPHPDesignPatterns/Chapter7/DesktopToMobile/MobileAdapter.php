<?php
/**
 * Created by PhpStorm.
 * 手機版的適應器
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午9:52
 */

include_once "IDesktopFormat.php";
include_once "Mobile.php";

class MobileAdapter implements IDesktopFormat
{
    /** @var IMobileFormat 手機版物件 */
    private $mobile;

    /**
     * MobileAdapter constructor.
     *
     * @param IMobileFormat $mobileFormat 依賴介面
     */
    public function __construct(IMobileFormat $mobileFormat)
    {
        $this->mobile = $mobileFormat;
    }

    /**
     * 格式化CSS
     */
    public function formatCSS()
    {
        $this->mobile->formatCSS();
    }

    /**
     * 格式化加入圖片
     */
    public function formatGraphics()
    {
        $this->mobile->formatGraphics();
    }

    /**
     * 垂直佈局
     */
    public function horizontalLayout()
    {
        $this->mobile->verticalLayout();
    }
}