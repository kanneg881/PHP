<?php
/**
 * Created by PhpStorm.
 * 實作 IConnectInfo
 * User: Jackson
 * Date: 2018/1/17
 * Time: 下午6:02
 */

namespace Chapter12\Example;

include_once "IConnectInfo.php";

use mysqli;

class UniversalConnect implements IConnectInfo
{
    /** @var string 主機 */
    private static $server = IConnectInfo::HOST;
    /** @var string 使用者 */
    private static $user = IConnectInfo::USER_NAME;
    /** @var string 密碼 */
    private static $password = IConnectInfo::PASSWORD;
    /** @var string 資料庫 */
    private static $database = IConnectInfo::DATABASE_NAME;
    /** @var mysqli 資料庫物件 */
    private static $mysqli;

    /**
     * 資料庫連線
     *
     * @return mysqli|bool 資料庫物件
     */
    public function doConnect()
    {
        // 資料庫連線
        self::$mysqli = mysqli_connect(self::$server, self::$user, self::$password,
            self::$database);

        // 連線失敗
        if (mysqli_connect_error()) {
            echo "這是失敗的原因: " . mysqli_connect_error();
            return false;
        }

        echo "成功連線到 MySQL<br>";

        return self::$mysqli;
    }
}