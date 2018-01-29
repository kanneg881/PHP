<?php
/**
 * Created by PhpStorm.
 * 狗物件繼承毛茸茸的動物物件
 * User: Jackson
 * Date: 2017/12/30
 * Time: 下午12:16
 */

include_once "FurryPets.php";

class Dogs extends FurryPets
{
    function __construct()
    {
        echo "狗" . $this->fourLegs() . "<br>";
        echo $this->makeSound("汪, 汪") . "<br>";
        echo $this->guardsHouse();
    }

    /**
     * 守護房子
     *
     * @return string 吼叫
     */
    private function guardsHouse()
    {
        return "唬嗚嗚嗚嗚嗚" . "<br>";
    }
}