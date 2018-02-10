<?php
/**
 * Created by PhpStorm.
 * 觀察者介面
 * User: Jackson
 * Date: 2018/1/24
 * Time: 下午12:46
 */

namespace Chapter14\nonSPLObserver;

interface Observer
{
    /**
     * 從訂閱接收更新
     *
     * @param Subject $subject 訂閱
     */
    function update(Subject $subject);
}