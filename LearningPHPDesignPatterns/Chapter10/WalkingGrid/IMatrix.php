<?php
/**
 * Created by PhpStorm.
 * 走格子介面
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午9:07
 */

interface IMatrix
{
    /**
     * 往下走
     */
    public function goDown();

    /**
     * 往左走
     */
    public function goLeft();

    /**
     * 往右走
     */
    public function goRight();

    /**
     * 往上走
     */
    public function goUp();
}