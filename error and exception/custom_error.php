<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2017/9/24
 * Time: 下午6:31
 */

/**
 * 自定義錯誤函數
 *
 * @param int $error_level 錯誤等級
 * @param string $error_message 錯誤訊息
 * @param string $error_file 發生錯誤的檔案名稱
 * @param int $error_line 發生錯誤的行數
 */
function customError($error_level, $error_message, $error_file, $error_line)
{
    //顯示錯誤等級
    switch ($error_level) {
        // 執行時警告
        case E_WARNING:
            echo "<b>警告:</b>";
            break;

        // 執行時注意
        case E_NOTICE:
            echo "<b>注意:</b>";
            break;

        // 使用者產生的錯誤
        case E_USER_ERROR:
            echo "<b>錯誤:</b>";
            break;

        // 使用者產生的警告
        case E_USER_WARNING:
            echo "<b>警告:</b>";
            break;

        // 使用者產生的注意
        case E_USER_NOTICE:
            echo "<b>注意:</b>";
            break;

        // 未知的錯誤
        default:
            echo "<b>未知的錯誤:</b>";
            break;
    }
    echo "[$error_level] $error_message<br>檔案位置：$error_file 第 $error_line 行<br>";
}

// 設定自定義錯誤函數處理
set_error_handler("customError");

// 錯誤示範，輸出未定義的變數
echo $undefined;
?>