<?php
/**
 * Created by PhpStorm.
 * 實作 ProtectVis
 * User: Jackson
 * Date: 2017/12/30
 * Time: 上午2:38
 */

include_once "ProtectVis.php";

class ConcreteProtect extends ProtectVis
{
    function __construct()
    {
        $this->countMoney();
    }

    /**
     * 計算金錢
     */
    protected function countMoney()
    {
        $this->wage = "你每小時工資是$";
        echo $this->wage . $this->setHourly(36);
    }
}

$worker = new ConcreteProtect();