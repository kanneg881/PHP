<?php
/**
 * Created by PhpStorm.
 * 具體觀察者
 * User: Jackson
 * Date: 2018/1/23
 * Time: 下午2:19
 */

class ConcreteObserver implements SplObserver
{
    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        // 具體SplSubject 函式名稱 ConcreteSubject->getData()
        $getData = "getData";
        echo $subject->$getData() . "<br>";
    }
}