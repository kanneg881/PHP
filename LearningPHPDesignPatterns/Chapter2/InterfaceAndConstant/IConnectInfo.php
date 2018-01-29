<?php
/**
 * Created by PhpStorm.
 * 介面和常數
 * User: Jackson
 * Date: 2017/12/29
 * Time: 上午8:47
 */

namespace Chapter2;

interface IConnectInfo
{
    /** 伺服器 */
    const HOST = "localhost";
    /** 使用者名稱 */
    const UNAME = "your-user-name";
    /** 資料庫名稱 */
    const DBNAME = "your-DB-name";
    /** 密碼 */
    const PW = "your-password";

    /**
     * 測試連線
     */
    function testConnection();
}