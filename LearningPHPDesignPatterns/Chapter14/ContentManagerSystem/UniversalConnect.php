<?php
/**
 * Created by PhpStorm.
 * 通用MySQL連結
 * User: Jackson
 * Date: 2018/1/24
 * Time: 下午10:08
 */

include_once "IConnectInfo.php";

class UniversalConnect implements IConnectInfo
{
    /** @var mysqli 資料庫物件 */
    private static $mysqli;
    /** @var string 主機 */
    private static $server = IConnectInfo::HOST;
    /** @var string 使用者 */
    private static $user = IConnectInfo::USER_NAME;
    /** @var string 密碼 */
    private static $password = IConnectInfo::PASSWORD;
    /** @var string 資料庫 */
    private static $database = IConnectInfo::DATABASE_NAME;

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
        // 除錯指令

        return self::$mysqli;
    }
}