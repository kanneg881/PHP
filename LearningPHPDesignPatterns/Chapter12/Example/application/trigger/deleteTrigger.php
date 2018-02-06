<?php
/**
 * Created by PhpStorm.
 * 刪除紀錄觸發器
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:17
 */

include_once "../Client.php";

use Chapter12\Example\Client;

// 觸發器
$trigger = new Client();
$trigger->deleteData();