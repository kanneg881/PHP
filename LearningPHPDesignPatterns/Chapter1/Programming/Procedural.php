<?php
/**
 * Created by PhpStorm.
 * 程序編程
 * User: Jackson
 * Date: 2017/12/28
 * Time: 上午9:00
 */

/**
 * 數字加總
 *
 * @param int $first 數字1
 * @param int $second 數字2
 */
function addEmUp($first, $second)
{
    /** @var int $total 總計 */
    $total = $first + $second;
    echo $total;
}

addEmUp(20, 40);