<?php
/**
 * Created by PhpStorm.
 * 變數到物件範例
 * User: Jackson
 * Date: 2018/1/6
 * Time: 下午7:08
 */

interface IPrototype
{
    /** 原型介面字串 */
    const PROTOTYPE = "IPrototype";

    /**
     * 克隆魔術方法
     */
    function __clone();
}

class DynamicObjectNaming implements IPrototype
{
    /** 具體實作原型介面字串 */
    const CONCRETE = "[具體]DynamicObjectNaming";

    public function __construct()
    {
        echo "這是動態的創建<br>";
    }

    /**
     * 工作
     */
    public function doWork()
    {
        echo "<br>這是分配的任務<br>";
    }

    /**
     * 克隆魔術方法
     */
    function __clone()
    {
    }
}

/** @var array $employeeData 員工資料 */
$employeeData = array(
    'DynamicObjectNaming',
    'Tess',
    'mar',
    'John',
    'eng',
    'Olivia',
    'man'
);

/** @var string $dynamicObjectNaming DynamicObjectNaming物件名稱 */
$dynamicObjectNaming = $employeeData[0];
/** @var DynamicObjectNaming $employeeData [6] DynamicObjectNaming物件 */
$employeeData[6] = new $dynamicObjectNaming;
/** @var DynamicObjectNaming::doWork() $work DynamicObjectNaming doWork() 函式 */
$work = "doWork";

echo $employeeData[6]::CONCRETE;
$employeeData[6]->$work();

/** @var DynamicObjectNaming $employeeName DynamicObjectNaming物件 */
$employeeName = $employeeData[5];
$employeeName = clone $employeeData[6];

$employeeName->doWork();
echo "這是克隆的 " . $employeeName::CONCRETE . "<br>";
echo $employeeName::PROTOTYPE . " 的子類別";