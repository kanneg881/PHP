<?php
/**
 * Created by PhpStorm.
 * 實作 IProduct
 * User: Jackson
 * Date: 2017/12/29
 * Time: 上午9:17
 */

include_once "IProduct.php";

class FruitStore implements IProduct
{
    /**
     * 蘋果
     */
    function apples()
    {
        return "水果店經濟特區 - 我們有蘋果。<br>";
    }

    /**
     * 柳橙
     */
    function oranges()
    {
        return "水果店經濟特區 - 我們沒有柑橘類水果。<br>";
    }
}