<?php
/**
 * Created by PhpStorm.
 * 實作IMethodHolder
 * User: Jackson
 * Date: 2017/12/28
 * Time: 下午11:46
 */

include_once "IMethodHolder.php";

class ImplementAlpha implements IMethodHolder
{
    /**
     * 取得資訊
     *
     * @param mixed $info 資訊
     */
    public function getInfo($info)
    {
        echo "這是新聞! " . $info . "<br>";
    }

    /**
     * 發送資訊
     *
     * @param mixed $info 資訊
     * @return mixed 資訊
     */
    public function sendInfo($info)
    {
        return $info;
    }

    /**
     * 計算兩個數字
     *
     * @param int $first 數字1
     * @param int $second 數字2
     * @return mixed 計算結果
     */
    public function calculate($first, $second)
    {
        // 計算結果
        $calculated = $first * $second;
        return $calculated;
    }

    /**
     * 可以加上任何數量的其他方法與屬性。
     */
    public function useMethods()
    {
        $this->getInfo("天要塌下來了...");
        echo $this->sendInfo("為參議員Snort投票!") . "<br>";
        echo "在你兼職的時候你獲得$" . $this->calculate(20, 15) . "<br>";
    }
}

$worker = new ImplementAlpha();
$worker->useMethods();