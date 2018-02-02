<?php
/**
 * Created by PhpStorm.
 * IAcmePrototype介面實作-管理
 * User: Jackson
 * Date: 2018/1/6
 * Time: 下午12:20
 */

include_once "IAcmePrototype.php";

class Management extends IAcmePrototype
{
    /** 單位 */
    const UNIT = "管理";
    /** @var string 部門 */
    private $operations = "營運";
    /** @var string 部門 */
    private $plan = "規劃";
    /** @var string 部門 */
    private $research = "研發";

    /**
     * 克隆魔術方法
     */
    function __clone()
    {
    }

    /**
     * 取得部門名稱
     *
     * @return string 部門名稱
     */
    function getDepartment()
    {
        return $this->department;
    }

    /**
     * 設定部門
     *
     * @param int $departmentID 部門編號
     */
    function setDepartment($departmentID)
    {
        switch ($departmentID) {
            case 201:
                $this->department = $this->research;
                break;
            case 202:
                $this->department = $this->plan;
                break;
            case 203:
                $this->department = $this->operations;
                break;
            default:
                $this->department = "無法識別的部門";
        }
    }
}