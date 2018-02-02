<?php
/**
 * Created by PhpStorm.
 * 現代商業組織介面
 * User: Jackson
 * Date: 2018/1/6
 * Time: 上午2:21
 */

abstract class IAcmePrototype
{
    /** @var string 部門 */
    protected $department;
    /** @var string 員工姓名 */
    protected $employeeName;
    /** @var string 員工照片 */
    protected $employeePicture;
    /** @var string 員工編號 */
    protected $employeeID;


    /**
     * 克隆魔術方法
     */
    abstract function __clone();

    /**
     * 取得部門名稱
     *
     * @return string 部門名稱
     */
    abstract function getDepartment();

    /**
     * 設定部門
     *
     * @param int $departmentID 部門編號
     */
    abstract function setDepartment($departmentID);

    /**
     * 取得員工編號
     *
     * @return string 員工編號
     */
    public function getEmployeeID()
    {
        return $this->employeeID;
    }

    /**
     * 取得員工姓名
     *
     * @return string 員工姓名
     */
    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    /**
     * 取得員工照片
     *
     * @return string 員工照片
     */
    public function getEmployeePicture()
    {
        return $this->employeePicture;
    }

    /**
     * 設定員工編號
     *
     * @param string $employeeID 員工編號
     */
    public function setEmployeeID($employeeID)
    {
        $this->employeeID = $employeeID;
    }

    /**
     * 設定員工姓名
     *
     * @param string $employeeName 員工姓名
     */
    public function setEmployeeName($employeeName)
    {
        $this->employeeName = $employeeName;
    }

    /**
     * 設定員工照片
     *
     * @param string $employeePicture 員工照片
     */
    public function setEmployeePicture($employeePicture)
    {
        $this->employeePicture = $employeePicture;
    }
}