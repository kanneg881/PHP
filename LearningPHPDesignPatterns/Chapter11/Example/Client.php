<?php
/**
 * Created by PhpStorm.
 * 處理Login表單
 * User: Jackson
 * Date: 2018/1/16
 * Time: 上午9:07
 */

namespace Chapter11\Example;

include_once "Proxy.php";

use mysqli;
use Proxy;

class Client
{
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 密碼 */
    private $password;
    /** @var Proxy Proxy物件 */
    private $proxy;
    /** @var string 資料表 */
    private $table;
    /** @var string 使用者 */
    private $userName;


    public function __construct()
    {
        $this->table = "proxyLog";
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->userName = $this->mysqli->real_escape_string(trim($_POST['userName']));
        $this->password = $this->mysqli->real_escape_string(trim($_POST['password']));
        $this->getSubject($this->proxy = new Proxy());
    }

    /**
     * 取得 Subject 內容
     *
     * @param Proxy $proxy 代理物件
     */
    private function getSubject(Proxy $proxy)
    {
        $proxy->login($this->userName, $this->password);
    }
}

new Client();