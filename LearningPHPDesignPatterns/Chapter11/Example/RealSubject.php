<?php
/**
 * Created by PhpStorm.
 * 真正的Subject主體
 * User: Jackson
 * Date: 2018/1/16
 * Time: 上午9:30
 */

include_once "ISubject.php";

use Chapter11\Example\ISubject;

class RealSubject implements ISubject
{
    /**
     * 請求
     */
    function request()
    {
        // 輸出
        $output = <<<REQUEST
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="asset/css/proxy.css">
</head>
<body>
<header>
PHP提示表:
<br>
<sapn class="subhead">給物件導向開發人員</sapn>
</header>
<ol>
<li>程序到介面，而不是執行。</li>
<li>封裝你的物件</li>
<li>組合利於類別繼承。</li>
<li>一個類別應該只有單一的責任。</li>
</ol>
</body>
</html>
REQUEST;
        echo $output;
    }
}