<?php
/**
 * Created by PhpStorm.
 * 約會服務使用者介面
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午11:09
 */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="asset/css/developerDating.css">
    <title>開發者交友服務</title>
</head>
<body>
<article>
    <header>&nbsp;&nbsp;開發交友</header>
    <h2>&nbsp;為開發者提供交友服務</h2>
    <h3>&nbsp;尋找:</h3>
    <form action="ClientH.php" method="post">
        <div id="sex">
            <div id="fem">
                <img src="asset/image/grrrl.jpg" width="99" height="133" alt="grrrl">
                <br>
                <label>
                    <input type="radio" name="gender" value="Female">
                </label>
                <br>
                <span>Grrrl</span>
            </div>
            <aside>
                <img src="asset/image/dude.jpg" width="99" height="133" alt="dude">
                <br>
                <label>
                    <input type="radio" name="gender" value="Male">
                </label>
                <br>
                <span>Dude</span>
            </aside>
        </div>
        <p></p>
        <strong>年齡</strong>
        <br>
        <label>
            <input type="radio" name="ageGroup" value="群組1">
            &nbsp;18-29: 群組 1
        </label>
        <br>
        <label>
            <input type="radio" name="ageGroup" value="群組2">
            &nbsp;30-39: 群組 2
        </label>
        <br>
        <label>
            <input type="radio" name="ageGroup" value="群組3">
            &nbsp;40-49: 群組 3
        </label>
        <br>
        <label>
            <input type="radio" name="ageGroup" value="群組4">
            &nbsp;50+: 群組 4
        </label>
        <p></p>
        <strong>最喜歡的程式語言</strong>
        <br>
        <label>
            <input type="radio" name="programLanguage" value="PHP">
            &nbsp;PHP
        </label>
        <br>
        <label>
            <input type="radio" name="programLanguage" value="CSharp">
            &nbsp;C#
        </label>
        <br>
        <label>
            <input type="radio" name="programLanguage" value="JavaScript">
            &nbsp;JavaScript
        </label>
        <br>
        <label>
            <input type="radio" name="programLanguage" value="ActionScript3">
            &nbsp;ActionScript 3.0
        </label>
        <p></p>
        <strong>主要的硬體</strong>
        <br>
        <label>
            <input type="radio" name="hardware" value="MAC">
            &nbsp;蘋果
        </label>
        <br>
        <label>
            <input type="radio" name="hardware" value="DELL">
            &nbsp;戴爾
        </label>
        <br>
        <label>
            <input type="radio" name="hardware" value="HP">
            &nbsp;惠普
        </label>
        <br>
        <label>
            <input type="radio" name="hardware" value="LINUX">
            &nbsp;Linux Box
        </label>
        <p></p>
        <strong>最喜歡的食物</strong>
        <br>
        <label>
            <input type="radio" name="food" value="pizza">
            &nbsp;披薩
        </label>
        <br>
        <label>
            <input type="radio" name="food" value="burger">
            &nbsp;漢堡
        </label>
        <br>
        <label>
            <input type="radio" name="food" value="nachos">
            &nbsp;玉米片
        </label>
        <br>
        <label>
            <input type="radio" name="food" value="veggies">
            &nbsp;蔬菜
        </label>
        <p></p>
        <strong>最喜歡的電影類型</strong>
        <br>
        <label>
            <input type="radio" name="film" value="action">
            &nbsp;動作
        </label>
        <br>
        <label>
            <input type="radio" name="film" value="romance">
            &nbsp;愛情
        </label>
        <br>
        <label>
            <input type="radio" name="film" value="Science">
            &nbsp;科幻
        </label>
        <br>
        <label>
            <input type="radio" name="film" value="horror">
            &nbsp;恐怖
        </label>
        <p></p>
        <input type="submit" name="search" value="尋找真愛">
    </form>
</article>
</body>
</html>

