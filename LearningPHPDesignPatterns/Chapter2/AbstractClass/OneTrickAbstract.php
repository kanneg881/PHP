<?php
/**
 * Created by PhpStorm.
 * OneTrick的抽象類別
 * User: Jackson
 * Date: 2017/12/28
 * Time: 下午11:12
 */

abstract class OneTrickAbstract
{
    /** @var mixed 可以當作是抽象屬性 */
    public $storeHere;

    /**
     * 抽象方法
     *
     * @param mixed $whatever 參數
     */
    abstract public function trick($whatever);
}