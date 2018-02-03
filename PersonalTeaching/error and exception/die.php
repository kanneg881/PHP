<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2017/9/24
 * Time: 上午11:25
 */

/**
 * 使用三木運算式 條件式(布林值) ? 布林為真執行這裡 : 布林為假執行這裡
 * file_exists(檔案名稱) 檢查檔案是否存在
 * fopen(檔案名稱, 模式) 打開檔案，r表示檔案只能讀取
 * die(字串) 輸出錯誤，終止程式
 */
file_exists("fileName.txt") ? $file = fopen("fileName.txt", "r") : die("檔案不存在");
?>
