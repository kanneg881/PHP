<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * Prototype設計模式，不可或缺的參與者
 * User: Jackson
 * Date: 2018/1/5
 * Time: 下午11:53
 */

namespace Chapter6\Drosophila;

include_once "MalePrototype.php";
include_once "FemalePrototype.php";

use MalePrototype;
use FemalePrototype;

class Client
{
    // 用於直接實例化
    /** @var MalePrototype 蠅1 */
    private $fly1;
    /** @var FemalePrototype 蠅2 */
    private $fly2;

    // 用於複製
    /** @var MalePrototype 克隆蠅1 */
    private $clone1Fly;
    /** @var FemalePrototype 克隆蠅2 */
    private $clone2Fly;
    /** @var FemalePrototype 突變克隆蠅 */
    private $variantCloneFly;

    public function __construct()
    {
        // 實例化
        $this->fly1 = new MalePrototype();
        $this->fly2 = new FemalePrototype();

        // 複製
        $this->clone1Fly = clone $this->fly1;
        $this->clone2Fly = clone $this->fly2;
        $this->variantCloneFly = clone $this->fly2;

        $this->clone1Fly->mated = "已交配";
        $this->clone2Fly->fecundity = 186;
        $this->variantCloneFly->eyeColor = "紫";
        $this->variantCloneFly->wingBeat = 220;
        $this->variantCloneFly->unitEyes = 750;
        $this->variantCloneFly->fecundity = 92;

        // 透過類型提示方法傳送
        $this->showFly($this->clone1Fly);
        $this->showFly($this->clone2Fly);
        $this->showFly($this->variantCloneFly);
    }

    /**
     * 顯示蠅
     *
     * @param FemalePrototype|MalePrototype $fly 蠅
     */
    private function showFly($fly)
    {
        echo "眼睛顏色: " . $fly->eyeColor . "<br>";
        echo "振動翅膀/秒: " . $fly->wingBeat . "<br>";
        echo "眼睛單位: " . $fly->unitEyes . "<br>";
        // 性別
        $gender = $fly::gender;
        echo "性別: " . $gender . "<br>";
        echo $gender == "母" ? "產卵數量: " . $fly->fecundity : "交配: " . $fly->mated;
        echo "<p></p>";
    }
}

new Client();