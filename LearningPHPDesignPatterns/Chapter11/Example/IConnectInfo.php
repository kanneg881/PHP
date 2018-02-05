<?php
/**
 * Created by PhpStorm.
 * Pregnant 介面
 * User: Jackson
 * Date: 2018/1/15
 * Time: 上午8:54
 */

namespace Chapter11\Example;

use mysqli;

interface IConnectInfo
{
    /** 主機名稱 */
    const HOST = "yourHost";
    /** 使用者名稱 */
    const USER_NAME = "yourUserName";
    /** 使用者密碼 */
    const PASSWORD = "yourPassword";
    /** 資料庫名稱 */
    const DATABASE_NAME = "yourDatabaseName";

    /**
     * 資料庫連線
     *
     * @return mysqli 資料庫物件
     */
    public function doConnect();
}