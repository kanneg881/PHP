<?php
/**
 * Created by PhpStorm.
 * 北部地區，實作IAbstract
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午12:44
 */

include_once "IAbstract.php";

class NorthRegion extends IAbstract
{

    /**
     * 給花費
     *
     * @return float decimal
     */
    protected function giveCost()
    {
        return 210.54;
    }

    /**
     * 給城市
     *
     * @return string
     */
    protected function giveCity()
    {
        return "Moose Breath";
    }
}