<?php
/**
 * Created by PhpStorm.
 * 實作 IProduct
 * User: Jackson
 * Date: 2017/12/29
 * Time: 上午9:24
 */

include_once "IProduct.php";

class CitrusStore implements IProduct
{
    /**
     * 蘋果
     */
    function apples()
    {
        return "柑橘店經濟特區 - 我們不賣蘋果。<br>";
    }

    /**
     * 柳橙
     */
    function oranges()
    {
        return "柑橘店經濟特區 - 我們有柑橘類水果。<br>";
    }
}