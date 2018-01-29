<?php
/**
 * Created by PhpStorm.
 * 單一方法的簡單類別
 * User: Jackson
 * Date: 2017/12/28
 * Time: 上午9:21
 */

class OneTrick
{
    /** @var mixed 存放的資料 */
    private $storeHere;

    /**
     * 觸發的函式
     *
     * @param mixed $whatever 任何資料
     * @return mixed 回傳資料
     */
    public function trick($whatever)
    {
        $this->storeHere = $whatever;
        return $this->storeHere;
    }
}