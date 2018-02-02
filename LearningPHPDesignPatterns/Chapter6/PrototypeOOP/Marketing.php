<?php
/**
 * Created by PhpStorm.
 * IAcmePrototype介面實作-行銷
 * User: Jackson
 * Date: 2018/1/6
 * Time: 下午12:20
 */

include_once "IAcmePrototype.php";

class Marketing extends IAcmePrototype
{
    /** 單位 */
    const UNIT = "行銷";
    /** @var string 部門 */
    private $sales = "業務";
    /** @var string 部門 */
    private $promotion = "推廣";
    /** @var string 部門 */
    private $strategic = "策略規劃";

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
            case 101:
                $this->department = $this->sales;
                break;
            case 102:
                $this->department = $this->promotion;
                break;
            case 103:
                $this->department = $this->strategic;
                break;
            default:
                $this->department = "無法識別的部門";
        }
    }
}