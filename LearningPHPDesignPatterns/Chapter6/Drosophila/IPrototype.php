<?php
/**
 * Created by PhpStorm.
 * 果蠅介面
 * User: Jackson
 * Date: 2018/1/5
 * Time: 下午10:17
 */

namespace Chapter6\Drosophila;

abstract class IPrototype
{
    /** @var string 眼睛顏色 */
    public $eyeColor;
    /** @var int 每秒拍動次數 */
    public $wingBeat;
    /** @var int 眼睛單位的數目 */
    public $unitEyes;

    /**
     * 克隆魔術方法
     */
    abstract function __clone();
}