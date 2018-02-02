<?php
/**
 * Created by PhpStorm.
 * 母果蠅物件
 * User: Jackson
 * Date: 2018/1/5
 * Time: 下午10:21
 */

include_once "IPrototype.php";

use Chapter6\Drosophila\IPrototype;

class FemalePrototype extends IPrototype
{
    /** 性別 */
    const gender = "母";
    /** @var int 生殖能力(它剩餘的產卵數) */
    public $fecundity;

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