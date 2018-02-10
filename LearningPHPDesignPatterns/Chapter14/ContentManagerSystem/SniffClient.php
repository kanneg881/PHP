<?php
/**
 * Created by PhpStorm.
 * 嗅探用戶端
 * User: Jackson
 * Date: 2018/1/26
 * Time: 下午7:38
 */

include_once "ConcreteObserverDesktop.php";
include_once "ConcreteObserverPhone.php";
include_once "ConcreteObserverTablet.php";
include_once "ConcreteSubject.php";

class SniffClient
{
    /** @var Subject 具體訂閱者 */
    private $concreteSubject;
    /** @var string 設計模式 */
    private $designPattern;
    /** @var Observer 具體設備觀察者  */
    private $deviceObserver;
    /** @var bool 是否為移動設備 */
    private $isMobile = false;
    /** @var string 使用者代理 */
    private $userAgent;

    public function __construct()
    {
        if (isset($_POST['designPattern'])) {
            $this->designPattern = $_POST['designPattern'];
        }
        $this->concreteSubject = new ConcreteSubject();
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];

        if (stripos($this->userAgent, 'android')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverPhone();
        }

        if (stripos($this->userAgent, 'blackberry')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverPhone();
        }

        if (stripos($this->userAgent, 'iphone')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverPhone();
        }

        if (stripos($this->userAgent, 'ipad')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverTablet();
        }

        if (stripos($this->userAgent, 'kindle fire')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverTablet();
        }

        if (stripos($this->userAgent, 'silk')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverTablet();
        }

        if (stripos($this->userAgent, 'trident')) {
            $this->isMobile = true;
            $this->deviceObserver = new ConcreteObserverTablet();
        }

        if (!$this->isMobile) {
            $this->deviceObserver = new ConcreteObserverDesktop();
        }

        $this->concreteSubject->attachObserver($this->deviceObserver);
        $this->concreteSubject->setState($this->designPattern);
    }
}

new SniffClient();