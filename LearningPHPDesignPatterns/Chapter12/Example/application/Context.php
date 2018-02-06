<?php
/**
 * Created by PhpStorm.
 * 將請求與具體 strategy 分開
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:41
 */

namespace Chapter12\Example;

class Context
{
    /** @var array 資料包，由HTML表單的資料組成 */
    private $dataPack;
    /** @var IStrategy IStrategy參考 */
    private $strategy;

    public function __construct(IStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * 演算法
     *
     * @param array $dataPack 資料包，由HTML表單的資料組成
     */
    public function algorithm(Array $dataPack)
    {
        $this->dataPack = $dataPack;
        $this->strategy->algorithm($this->dataPack);
    }
}