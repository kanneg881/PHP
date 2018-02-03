<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2017/9/24
 * Time: 下午9:39
 */

// 比大小函數
function get_bigger_number($number1, $number2)
{
    // 如果不是整數型態就拋出例外
    if (!is_int($number1) || !is_int($number2)) {
        throw new Exception("get_bigger_number 參數必須是整數");
    }
    if ($number1 > $number2) {
        return $number1;
    } else {
        return $number2;
    }
}

// 例外處理必須要在try catch 區塊裡面
try {
    // 輸出比較大的數字
    echo get_bigger_number("2", 3);

} catch (Exception $exception) {
    // 輸出例外
    echo "例外: " . $exception->getMessage();
}
?>