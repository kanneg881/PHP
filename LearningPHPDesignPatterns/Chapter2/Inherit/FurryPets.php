<?php
/**
 * Created by PhpStorm.
 * 毛茸茸的動物物件
 * User: Jackson
 * Date: 2017/12/30
 * Time: 下午12:12
 */

class FurryPets
{
    /** @var string 動物叫聲 */
    protected $sound;

    /**
     * 四條腿函式
     *
     * @return string 回傳用四條腿走路
     */
    protected function fourLegs()
    {
        return "用四條腿走路";
    }

    /**
     * 製作動物的聲音
     *
     * @param string $petNoise 動物聲音
     * @return string 回傳動物聲音
     */
    protected function makeSound($petNoise)
    {
        $this->sound = $petNoise;
        return $this->sound;
    }
}