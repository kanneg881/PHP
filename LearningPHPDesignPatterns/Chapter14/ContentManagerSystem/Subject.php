<?php
/**
 * Created by PhpStorm.
 * 訂閱介面
 * User: Jackson
 * Date: 2018/1/26
 * Time: 下午7:50
 */

abstract class Subject
{
    /** @var array 觀察者陣列 */
    protected $observers = array();

    /**
     * 連接觀察者
     *
     * @param Observer $observer 觀察者
     */
    public function attachObserver(Observer $observer)
    {
        // 將觀察者元素放入陣列的末尾
        array_push($this->observers, $observer);
    }

    /**
     * 分離觀察者
     *
     * @param Observer $observer 觀察者
     */
    public function detachObserver(Observer $observer)
    {
        // 位移
        $offset = 0;

        /**
         * @var Observer $item 觀察者
         */
        foreach ($this->observers as $item) {
            ++$offset;

            if ($item === $observer) {
                // 去掉陣列中的某一部分
                array_splice($this->observers, $offset, 1);
            }
        }
    }

    /**
     * 通知觀察者
     */
    protected function notify()
    {
        /**
         * @var Observer $observer 觀察者
         */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}