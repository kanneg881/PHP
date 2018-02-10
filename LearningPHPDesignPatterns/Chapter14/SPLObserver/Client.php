<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/24
 * Time: 上午8:40
 */

namespace Chapter14\SPLObserver;

include_once "ConcreteObserver.php";
include_once "ConcreteSubject.php";

use ConcreteObserver;

class Client
{
    public function __construct()
    {
        echo "<p>創建三個新的具體觀察者，一個新的具體訂閱:</p>";

        /** @var ConcreteObserver $observer1 具體觀察者1 */
        $observer1 = new ConcreteObserver();
        /** @var ConcreteObserver $observer2 具體觀察者2 */
        $observer2 = new ConcreteObserver();
        /** @var ConcreteObserver $observer3 具體觀察者3 */
        $observer3 = new ConcreteObserver();
        /** @var ConcreteSubject $subject 具體訂閱者 */
        $subject = new ConcreteSubject();

        $subject->setSplObjectStorage();
        $subject->setData("這裡是你的資料!");
        $subject->attach($observer1);
        $subject->attach($observer2);
        $subject->attach($observer3);

        $subject->notify();

        echo "<p>分離觀察者 observer3。 現在只有 observer1 和 observer2 被通知:</p>";
        $subject->detach($observer3);
        $subject->notify();

        echo "<p>重新設定資料並且重新連接 observer3 和分離 observer2 -- 只有 observer1 和 
            observer3 被通知:</p>";

        $subject->setData("更多的資料只有 observer1 和 observer3 需要。");
        $subject->attach($observer3);
        $subject->detach($observer2);
        $subject->notify();
    }
}

new Client();