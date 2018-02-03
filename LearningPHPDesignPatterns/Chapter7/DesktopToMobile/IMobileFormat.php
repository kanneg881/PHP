<?php
/**
 * Created by PhpStorm.
 * 手機版介面
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午9:36
 */

interface IMobileFormat
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
     * 垂直佈局
     */
    public function verticalLayout();
}