<?php
/**
 * Created by PhpStorm.
 * 手機具體觀察者
 * User: Jackson
 * Date: 2018/1/24
 * Time: 下午1:01
 */

namespace Chapter14\nonSPLObserver;

include_once "Observer.php";

class ConcreteObserverPhone implements Observer
{
    /** @var mixed 狀態 */
    private $state;

    /**
     * 從訂閱接收更新
     *
     * @param Subject $subject 訂閱
     */
    function update(Subject $subject)
    {
        // ConcreteSubject->getState()
        $getState = "getState";
        $this->state = $subject->$getState();
        echo "<img src='asset/image/phone/$this->state'><br>";
    }
}