<?php
/**
 * Created by PhpStorm.
 * Getter 與 Setter
 * User: Jackson
 * Date: 2017/12/30
 * Time: 上午11:57
 */

class GetSet
{
    /** @var mixed 資料倉庫 */
    private $dataWarehouse;

    function __construct()
    {
        $this->setter(200);
        // 取得訪問器的資料
        $got = $this->getter();
        echo $got;
    }

    /**
     * 訪問器
     *
     * @return mixed 訪問私有變數
     */
    private function getter()
    {
        return $this->dataWarehouse;
    }

    /**
     * 賦值器
     *
     * @param mixed $setValue 賦予值
     */
    private function setter($setValue)
    {
        $this->dataWarehouse = $setValue;
    }
}

$worker = new GetSet();