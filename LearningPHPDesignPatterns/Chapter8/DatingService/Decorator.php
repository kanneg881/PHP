<?php
/**
 * Created by PhpStorm.
 * Decorator 參與者
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午9:57
 */

namespace Chapter8\DatingService;

abstract class Decorator extends IComponent
{
    /**
     * 取得年齡
     *
     * @return int 年齡
     */
    public function getAgeGroup()
    {
        return $this->ageGroup;
    }

    /**
     * 設定年齡
     *
     * @param int $ageGroup 年齡
     */
    public function setAgeGroup($ageGroup)
    {
        $this->ageGroup = $ageGroup;
    }
}