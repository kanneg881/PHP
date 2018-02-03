<?php
/**
 * Created by PhpStorm.
 * 歐元轉接器
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午5:49
 */

include_once "EuroCalculate.php";
include_once "IAdapter.php";

class EuroAdapter extends EuroCalculate implements IAdapter
{
    public function __construct()
    {
        $this->requester();
    }

    /**
     * 請求器
     *
     * @return float
     */
    function requester()
    {
        $this->rate = .8111;
        return $this->rate;
    }
}