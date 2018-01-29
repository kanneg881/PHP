<?php
/**
 * Created by PhpStorm.
 * 私用範例
 * User: Jackson
 * Date: 2017/12/29
 * Time: 下午1:29
 */

class PrivateVis
{
    /** @var int 錢 */
    private $money;

    public function __construct()
    {
        $this->money = 200;
        $this->secret();
    }

    /**
     * 私有函式
     */
    private function secret()
    {
        echo $this->money;
    }
}

$worker = new PrivateVis();