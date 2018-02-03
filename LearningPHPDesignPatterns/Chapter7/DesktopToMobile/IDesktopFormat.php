<?php
/**
 * Created by PhpStorm.
 * 桌上型介面
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午6:27
 */

interface IDesktopFormat
{
    /**
     * 格式化CSS
     */
    public function formatCSS();

    /**
     * 格式化加入圖片
     */
    public function formatGraphics();

    /**
     * 水平佈局
     */
    public function horizontalLayout();
}