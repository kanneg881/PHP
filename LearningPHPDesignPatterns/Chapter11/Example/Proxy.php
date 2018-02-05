<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/1/16
 * Time: 上午9:08
 */

include_once "ISubject.php";
include_once "RealSubject.php";
include_once "UniversalConnect.php";

use Chapter11\Example\ISubject;
use Chapter11\Example\UniversalConnect;

class Proxy implements ISubject
{
    /** @var string 資料表 */
    private $table;
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var bool 登入 */
    private $isLogin;
    /** @var RealSubject RealSubject物件 */
    private $realSubject;

    /**
     * 登入
     *
     * @param string $userName 使用者名稱
     * @param string $password 密碼
     */
    public function login($userName, $password)
    {
        // 自Client過濾;將密碼編碼
        $MD5Password = md5($password);
        $this->isLogin = false;

        // 選擇表格與連結
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->table = "proxyLog";
        // 欄位名稱
        $column = "password";


        // 取得使用者密碼
        $sql = "SELECT $column FROM {$this->table} WHERE userName = '$userName'";

        // 查詢結果
        $result = $this->mysqli->query($sql);

        // 查詢失敗
        if ($result === false) {
            printf("失敗: %s <br>", $this->mysqli->error);
            exit();
        }

        // 一筆查詢的結果
        $row = $result->fetch_array(MYSQLI_ASSOC);

        // 如果密碼符合
        if ($row['password'] === $MD5Password) {
            $this->isLogin = true;
        }

        $result->close();
        $this->mysqli->close();

        if (!$this->isLogin) {
            echo "使用者名稱 和/或 密碼錯誤。";
            exit();
        }

        $this->request();
    }

    /**
     * 請求 RealSubject
     */
    public function request()
    {
        $this->realSubject = new RealSubject();
        $this->realSubject->request();
    }
}