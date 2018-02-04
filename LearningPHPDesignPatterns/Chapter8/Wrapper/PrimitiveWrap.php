<?php
/**
 * Created by PhpStorm.
 * 基本型態封裝範例
 * User: Jackson
 * Date: 2018/1/9
 * Time: 上午9:14
 */

class PrimitiveWrap
{
    /** @var mixed 封裝 */
    private $wrap;

    /**
     * PrimitiveWrap 建構子.
     *
     * @param mixed $primitive 原生資料
     */
    public function __construct($primitive)
    {
        $this->wrap = $primitive;
    }

    /**
     * 顯示封裝資料
     *
     * @return mixed 封裝資料
     */
    public function showWrap()
    {
        return $this->wrap;
    }
}

// 原生資料
$primitive = 521;
// 具體 PrimitiveWrap
$primitiveWrap = new PrimitiveWrap($primitive);
echo $primitiveWrap->showWrap();