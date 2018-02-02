<?php
/**
 * Created by PhpStorm.
 * IAcmePrototype介面實作-工程
 * User: Jackson
 * Date: 2018/1/6
 * Time: 下午12:20
 */

include_once "IAcmePrototype.php";

class Engineering extends IAcmePrototype
{
    /** 單位 */
    const UNIT = "工程";
    /** @var string 部門 */
    private $design = "美術";
    /** @var string 部門 */
    private $development = "程式";
    /** @var string 部門 */
    private $systemAdministration = "系統管理";

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
            case 301:
                $this->department = $this->development;
                break;
            case 302:
                $this->department = $this->design;
                break;
            case 303:
                $this->department = $this->systemAdministration;
                break;
            default:
                $this->department = "無法識別的部門";
        }
    }
}