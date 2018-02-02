<?php
/**
 * Created by PhpStorm.
 * 公果蠅物件
 * User: Jackson
 * Date: 2018/1/5
 * Time: 下午10:21
 */

include_once "IPrototype.php";

use Chapter6\Drosophila\IPrototype;

class MalePrototype extends IPrototype
{
    /** 性別 */
    const gender = "公";
    /** @var string 是否交配了沒 */
    public $mated;

    public function __construct()
    {
        $this->eyeColor = "紅";
        $this->wingBeat = 220;
        $this->unitEyes = 760;
    }

    /**
     * 克隆魔術方法
     */
    function __clone()
    {
    }
}