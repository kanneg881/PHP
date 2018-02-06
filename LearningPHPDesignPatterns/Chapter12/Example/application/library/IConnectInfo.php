<?php
/**
 * Created by PhpStorm.
 * 資料庫連線介面
 * User: Jackson
 * Date: 2018/1/17
 * Time: 下午6:03
 */

namespace Chapter12\Example;

use mysqli;

interface IConnectInfo
{
    /** 主機名稱 */
    const HOST = "localhost";
    /** 使用者名稱 */
    const USER_NAME = "root";
    /** 使用者密碼 */
    const PASSWORD = "";
    /** 資料庫名稱 */
    const DATABASE_NAME = "test_db";

    /**
     * 資料庫連線
     *
     * @return mysqli 資料庫物件
     */
    public function doConnect();
}