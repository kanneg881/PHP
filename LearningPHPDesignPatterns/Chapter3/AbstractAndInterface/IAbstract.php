<?php
/**
 * Created by PhpStorm.
 * 抽象類別介面
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午12:36
 */

abstract class IAbstract
{
    /** @var mixed 所有實作都可使用的屬性 */
    protected $valueNow;

    // 所有實作都必須包含下列2個方法：

    /**
     * 給花費
     *
     * @return float decimal
     */
    abstract protected function giveCost();

    /**
     * 給城市
     *
     * @return string
     */
    abstract protected function giveCity();

    /**
     * 這個具體函式可讓所有不重寫內容的類別實作使用
     */
    public function displayShow()
    {
        // 花費
        $stringCost = $this->giveCost();
        // 轉型成字串
        $stringCost = (string)$stringCost;
        // 合併花費和程式的字串
        $allTogether = ("花費: $" . $stringCost . " 給 " . $this->giveCity());
        return $allTogether;
    }
}