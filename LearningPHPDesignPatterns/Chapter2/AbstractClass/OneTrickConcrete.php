<?php
/**
 * Created by PhpStorm.
 * 實作 OneTrickAbstract
 * User: Jackson
 * Date: 2017/12/28
 * Time: 下午11:17
 */

include_once "OneTrickAbstract.php";

class OneTrickConcrete extends OneTrickAbstract
{
    /**
     * 繼承會強迫實作抽象方法
     *
     * @param mixed $whatever 參數
     * @return mixed 自訂回傳值
     */
    public function trick($whatever)
    {
        // 抽象類別的屬性不一定要使用
        $this->storeHere = "抽象屬性";
        return $whatever . $this->storeHere;
    }
}

$worker = new OneTrickConcrete();

echo $worker->trick("從抽象的起源...");