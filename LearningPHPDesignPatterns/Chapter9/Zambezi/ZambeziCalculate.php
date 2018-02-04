<?php
/**
 * Created by PhpStorm.
 * 實作IHook
 * User: Jackson
 * Date: 2018/1/13
 * Time: 下午5:24
 */

include_once "IHook.php";

class ZambeziCalculate extends IHook
{

    /**
     * 使用Hook增加運費
     */
    protected function addShippingHook()
    {
        if (!$this->freeShipping) {
            $this->fullCost += 12.95;
        }
    }

    /**
     * 增加稅
     */
    protected function addTax()
    {
        $this->fullCost = $this->total + ($this->total * .07);
    }

    /**
     * 顯示全部花費
     */
    protected function displayFullCost()
    {
        echo "你全部的費用是 $this->fullCost";
    }
}