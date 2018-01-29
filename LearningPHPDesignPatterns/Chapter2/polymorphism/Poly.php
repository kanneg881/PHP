<?php
/**
 * Created by PhpStorm.
 * 多型範例
 * User: Jackson
 * Date: 2017/12/30
 * Time: 下午4:52
 */

interface ISpeed
{
    /**
     * 巡航
     *
     * @return int 速度
     */
    function cruise();

    /**
     * 快速
     *
     * @return int 速度
     */
    function fast();

    /**
     * 慢速
     *
     * @return int 速度
     */
    function slow();
}

class Jet implements ISpeed
{
    /**
     * 巡航
     *
     * @return int 速度
     */
    function cruise()
    {
        return 1200;
    }

    /**
     * 快速
     *
     * @return int 速度
     */
    function fast()
    {
        return 1500;
    }

    /**
     * 慢速
     *
     * @return int 速度
     */
    function slow()
    {
        return 120;
    }
}

class Car implements ISpeed
{
    /**
     * 巡航
     *
     * @return int 速度
     */
    function cruise()
    {
        // 汽車巡航速度
        $carCruise = 65;
        return $carCruise;
    }

    /**
     * 快速
     *
     * @return int 速度
     */
    function fast()
    {
        // 汽車快速
        $carFast = 110;
        return $carFast;
    }

    /**
     * 慢速
     *
     * @return int 速度
     */
    function slow()
    {
        // 汽車慢速
        $carSlow = 15;
        return $carSlow;
    }
}

$f22 = new Jet();
$jetSlow = $f22->slow();
$jetCruise = $f22->cruise();
$jetFast = $f22->fast();

echo "<br>我的噴氣式飛機可以起飛在{$jetSlow}mph，然後巡航在{$jetCruise}mph，然而" .
    "我可以啟動它到{$jetFast}mph，如果我很趕的話<br>";

$ford = new Car();
$fordSlow = $ford->slow();
$fordCruise = $ford->cruise();
$fordFast = $ford->fast();

echo "<br>我的車沿著在一個學區{$fordSlow}mph，然後巡航{$fordCruise}mph" .
    "在高速公路上，然而我可以啟動它到{$fordFast}mph，如果我很趕的話<br>";