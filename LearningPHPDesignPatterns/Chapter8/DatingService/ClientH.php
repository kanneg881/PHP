<?php
/**
 * Created by PhpStorm.
 * 由DeveloperDating傳送資料給PHP用戶端類別
 * User: Jackson
 * Date: 2018/1/11
 * Time: 上午8:46
 */

include_once "Female.php";
include_once "Films.php";
include_once "Food.php";
include_once "Hardware.php";
include_once "Male.php";
include_once "ProgramLanguage.php";

use Chapter8\DatingService\IComponent;

class ClientH
{
    /** @var IComponent IComponent實例 */
    private $ConcreteComponent;
    /** @var string 程式語言 */
    private $programLanguage;
    /** @var string 硬體 */
    private $hardware;
    /** @var string 食物 */
    private $food;
    /** @var string 電影 */
    private $film;

    public function __construct()
    {
        /** @var Male|Female $gender 具體元件 */
        $gender = $_POST["gender"];
        // 年齡群組
        $ageGroup = $_POST["ageGroup"];
        $this->programLanguage = $_POST["programLanguage"];
        $this->hardware = $_POST["hardware"];
        $this->food = $_POST["food"];
        $this->film = $_POST["film"];

        $this->ConcreteComponent = new $gender();
        $this->ConcreteComponent->setAgeGroup($ageGroup);
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
        $ConcreteComponent = new ProgramLanguage($ConcreteComponent);
        $ConcreteComponent->setFeature($this->programLanguage);
        $ConcreteComponent = new Hardware($ConcreteComponent);
        $ConcreteComponent->setFeature($this->hardware);
        $ConcreteComponent = new Food($ConcreteComponent);
        $ConcreteComponent->setFeature($this->food);
        $ConcreteComponent = new Films($ConcreteComponent);
        $ConcreteComponent->setFeature($this->film);

        return $ConcreteComponent;
    }
}

new ClientH();