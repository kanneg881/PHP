<?php
/**
 * Created by PhpStorm.
 * 貓咪物件繼承毛茸茸的動物物件
 * User: Jackson
 * Date: 2017/12/30
 * Time: 下午12:21
 */

include_once "FurryPets.php";

class Cats extends FurryPets
{
    function __construct()
    {
        echo "貓咪" . $this->fourLegs() . "<br>";
        echo $this->makeSound("喵, 喵") . "<br>";
        echo $this->ownsHouse();
    }

    /**
     * 擁有的家函式
     *
     * @return string
     */
    private function ownsHouse()
    {
        return "我都只會走在鍵盤上." . "<br>";
    }
}