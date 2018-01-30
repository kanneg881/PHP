<?php
/**
 * Created by PhpStorm.
 * 西部地區，實作IAbstract
 * User: Jackson
 * Date: 2017/12/31
 * Time: 上午12:47
 */

include_once "IAbstract.php";

class WestRegion extends IAbstract
{

    /**
     * 給花費
     *
     * @return float decimal
     */
    protected function giveCost()
    {
        $solarSavings = 2;
        $this->valueNow = 210.54 / $solarSavings;
        return $this->valueNow;
    }

    /**
     * 給城市
     *
     * @return string
     */
    protected function giveCity()
    {
        return "Rattlesnake Gulch";
    }
}