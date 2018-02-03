<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午5:54
 */

namespace Chapter7\CurrencyExchange;

include_once "DollarCalculate.php";
include_once "EuroAdapter.php";

use DollarCalculate;
use EuroAdapter;
use IAdapter;


class Client
{
    /** @var EuroAdapter 歐元轉接器物件 */
    private $euroAdapter;
    /** @var DollarCalculate 美金物件 */
    private $dollarCalculate;

    public function __construct()
    {
        $this->euroAdapter = new EuroAdapter();
        $this->dollarCalculate = new DollarCalculate();
        // 歐元符號
        $euro = "&#8364;";
        echo "歐元: $euro" . $this->makeAdapterCalculate($this->euroAdapter) . "<br>";
        echo "美金: $" . $this->makeDollarCalculate($this->dollarCalculate);

    }

    /**
     * 轉接器計算
     *
     * @param IAdapter $adapter 轉接器
     * @return mixed 計算結果
     */
    private function makeAdapterCalculate(IAdapter $adapter)
    {
        // 請求計算函式名稱
        $requestCalculate = 'requestCalculate';
        return $adapter->$requestCalculate(40, 50);
    }

    /**
     * 美金計算
     *
     * @param DollarCalculate $dollarCalculate 美金計算
     * @return mixed 計算結果
     */
    private function makeDollarCalculate(DollarCalculate $dollarCalculate)
    {
        return $dollarCalculate->requestCalculate(40, 50);
    }
}

new Client();