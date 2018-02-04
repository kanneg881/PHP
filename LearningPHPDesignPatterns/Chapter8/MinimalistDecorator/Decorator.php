<?php
/**
 * Created by PhpStorm.
 * Decorator參與者
 * User: Jackson
 * Date: 2018/1/8
 * Time: 上午8:54
 */

namespace Chapter8\MinimalistDecorator;

/**
 * 這個類別繼承getSite()與getPrice()
 * 它仍然是一個抽象類別
 * 你不需要在這裡實作抽象類別
 * 它的工作是保持Component的參考
 * public function getSite() {}
 * public function getPrice() {}
 *
 * @package Chapter8\MinimalistDecorator
 */
abstract class Decorator extends IComponent
{
}