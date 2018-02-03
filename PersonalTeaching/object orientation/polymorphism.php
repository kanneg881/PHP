<?php

/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2017/9/24
 * Time: 上午12:19
 */

// 宣告車子介面
interface Car
{
    // 宣告顯示速度的方法
    public function show_maximum_speed();
}

// 藍寶堅尼車子類別
class Lamborghini implements Car
{
    // 最高時速
    private $maximum_speed = 400;

    // 顯示最高時速
    public function show_maximum_speed()
    {
        // 輸出最高時速
        echo "Lamborghini maximum speed : $this->maximum_speed 公里/小時";
    }
}

// 法拉利車子類別
class Ferrari implements Car
{
    // 最高時速
    private $maximum_speed = 350;

    // 顯示最高時速
    public function show_maximum_speed()
    {
        // 輸出最高時速
        echo "Ferrari maximum speed : $this->maximum_speed 公里/小時";
    }
}

// 顯示各個車子的細節
function show_car_detail($object)
{
    // 如果是Car的實例
    if ($object instanceof Car) {
        // 顯示最高時速
        $object->show_maximum_speed();
    } else {
        // 此物件不是Car的實例
        echo "This class isn't instance of Car";
    }
}

// <br>是html的換行語法
echo "實例化藍寶堅尼車子<br>";
show_car_detail(new Lamborghini());
echo "<br>";
echo "實例化法拉利車子<br>";
show_car_detail(new Ferrari ());
?>
