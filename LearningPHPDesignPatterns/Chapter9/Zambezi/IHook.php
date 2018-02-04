<?php
/**
 * Created by PhpStorm.
 * 樣板設計模式設置 hook
 * User: Jackson
 * Date: 2018/1/13
 * Time: 下午5:19
 */

abstract class IHook
{
    /** @var bool 免運費 */
    protected $freeShipping;
    /** @var float 全部費用 */
    protected $fullCost;
    /** @var int 總計 */
    protected $total;

    /**
     * 使用Hook增加運費
     */
    protected abstract function addShippingHook();

    /**
     * 增加稅
     */
    protected abstract function addTax();

    /**
     * 顯示全部花費
     */
    protected abstract function displayFullCost();

    /**
     * 樣板函式
     *
     * @param int $total 總計
     * @param bool $freeShipping 免運費
     */
    public function templateMethod($total, $freeShipping)
    {
        $this->total = $total;
        $this->freeShipping = $freeShipping;
        $this->addTax();
        $this->addShippingHook();
        $this->displayFullCost();
    }
}