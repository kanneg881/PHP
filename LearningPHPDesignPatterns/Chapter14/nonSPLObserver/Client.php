<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/24
 * Time: 下午6:31
 */

namespace Chapter14\nonSPLObserver;

include_once "ConcreteObserverDesktop.php";
include_once "ConcreteObserverPhone.php";
include_once "ConcreteObserverTablet.php";
include_once "ConcreteSubject.php";

class Client
{
    public function __construct()
    {
        /** @var ConcreteSubject $concreteSubject 具體訂閱者 */
        $concreteSubject = new ConcreteSubject();

        /** @var ConcreteObserverPhone $concreteObserverPhone 手機版觀察者 */
        $concreteObserverPhone = new ConcreteObserverPhone();
        /** @var ConcreteObserverTablet $concreteObserverTablet 平版觀察者 */
        $concreteObserverTablet = new ConcreteObserverTablet();
        /** @var ConcreteObserverDesktop $concreteObserverDesktop 桌上型觀察者 */
        $concreteObserverDesktop = new ConcreteObserverDesktop();

        $concreteSubject->attachObserver($concreteObserverPhone);
        $concreteSubject->attachObserver($concreteObserverTablet);
        $concreteSubject->attachObserver($concreteObserverDesktop);
        $concreteSubject->setState("car.jpg");
    }
}

new Client();