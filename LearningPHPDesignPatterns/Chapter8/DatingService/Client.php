<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/10
 * Time: 下午10:21
 */

namespace Chapter8\DatingService;

include_once "Female.php";
include_once "Films.php";
include_once "Food.php";
include_once "Hardware.php";
include_once "ProgramLanguage.php";

use Female;
use Films;
use Food;
use Hardware;
use ProgramLanguage;

class Client
{
    /** @var IComponent IComponent實例 */
    private $ConcreteComponent;

    public function __construct()
    {
        $this->ConcreteComponent = new Female();
        $this->ConcreteComponent->setAgeGroup("群組4");
        echo $this->ConcreteComponent->getAgeGroup();
        $this->ConcreteComponent = $this->wrapComponent($this->ConcreteComponent);
        echo $this->ConcreteComponent->getFeature();
    }

    /**
     * 封裝元件
     *
     * @param IComponent $ConcreteComponent 具體元件
     * @return mixed 封裝元件
     */
    private function wrapComponent(IComponent $ConcreteComponent)
    {
        $ConcreteComponent = new Films($ConcreteComponent);
        $ConcreteComponent->setFeature("action");
        $ConcreteComponent = new Food($ConcreteComponent);
        $ConcreteComponent->setFeature("veggies");
        $ConcreteComponent = new Hardware($ConcreteComponent);
        $ConcreteComponent->setFeature("LINUX");
        $ConcreteComponent = new ProgramLanguage($ConcreteComponent);
        $ConcreteComponent->setFeature("PHP");

        return $ConcreteComponent;
    }
}

new Client();