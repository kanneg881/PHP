<?php
/**
 * Created by PhpStorm.
 * 具體訂閱
 * User: Jackson
 * Date: 2018/1/24
 * Time: 上午9:08
 */

namespace  Chapter14\nonSPLObserver;

include_once "Subject.php";

class ConcreteSubject extends Subject
{
    /**
     * 設定狀態
     *
     * @param mixed $state 狀態
     */
    public function setState($state)
    {
        $this->state = $state;
        $this->notify();
    }

    /**
     * 取得狀態
     *
     * @return mixed 狀態
     */
    public function getState()
    {
        return $this->state;
    }
}