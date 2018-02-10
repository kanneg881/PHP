<?php
/**
 * Created by PhpStorm.
 * 具體訂閱
 * User: Jackson
 * Date: 2018/1/23
 * Time: 下午2:01
 */

namespace Chapter14\SPLObserver;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class ConcreteSubject implements SplSubject
{
    /** @var mixed 資料 */
    private $data;
    /** @var SplObjectStorage SplObjectStorage物件 */
    private $splObjectStorage;

    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->splObjectStorage->attach($observer);
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $this->splObjectStorage->detach($observer);
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {
        foreach ($this->splObjectStorage as $observer) {
            $observer->update($this);
        }
    }

    /**
     * 取得資料
     *
     * @return mixed 資料
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * 設定資料
     *
     * @param mixed $data 資料
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * 設定 SplObjectStorage物件
     */
    public function setSplObjectStorage()
    {
        $this->splObjectStorage = new SplObjectStorage();
    }
}