<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/6
 * Time: 下午2:54
 */

namespace Chapter6\PrototypeOOP;

include_once "Engineering.php";
include_once "Management.php";
include_once "Marketing.php";

use Engineering;
use IAcmePrototype;
use Management;
use Marketing;

class Client
{
    /** @var Engineering 工程物件 */
    private $engineer;
    /** @var Management 管理物件 */
    private $manage;
    /** @var Marketing 行銷物件 */
    private $market;

    public function __construct()
    {
        $this->makeConcretePrototype();

        // 行銷員工 Tess
        $Tess = clone $this->market;
        $this->setEmployee($Tess, "Tess Smith", 101,
            "ts101-1234", "tess.jpg");
        $this->showEmployee($Tess);

        // 行銷員工 Jacob
        $Jacob = clone $this->market;
        $this->setEmployee($Jacob, "Jacob Jones", 102,
            "jj101-2234", "jacob.jpg");
        $this->showEmployee($Jacob);

        // 管理員工 Ricky
        $Ricky = clone $this->manage;
        $this->setEmployee($Ricky, "Ricky Rodriguez",
            203, "rr-203-5634", "ricky.jpg");
        $this->showEmployee($Ricky);

        // 工程員工 Olivia
        $Olivia = clone $this->engineer;
        $this->setEmployee($Olivia, "Olivia Perez", 302,
            "op302-1278", "olivia.jpg");
        $this->showEmployee($Olivia);

        // 工程員工 John
        $John = clone $this->engineer;
        $this->setEmployee($John, "John Jackson", 301,
            "jj301-1454", "john.jpg");
        $this->showEmployee($John);
    }

    /**
     * 實作具體原型物件
     */
    private function makeConcretePrototype()
    {
        $this->market = new Marketing();
        $this->manage = new Management();
        $this->engineer = new Engineering();
    }

    /**
     * 設定員工資料
     *
     * @param IAcmePrototype $employee 員工物件
     * @param string $employeeName 員工姓名
     * @param int $departmentID 部門ID
     * @param string $employeeID 員工ID
     * @param string $employeePicture 員工照片
     */
    private function setEmployee(
        IAcmePrototype &$employee,
        $employeeName,
        $departmentID,
        $employeeID,
        $employeePicture
    ) {
        $employee->setEmployeeName($employeeName);
        $employee->setDepartment($departmentID);
        $employee->setEmployeeID($employeeID);
        $employee->setEmployeePicture(
            "asset/image/employeePicture/$employeePicture");
    }

    /**
     * 顯示員工資料
     *
     * @param IAcmePrototype $employee 員工物件
     */
    private function showEmployee(IAcmePrototype $employee)
    {
        // 員工照片
        $employeePicture = $employee->getEmployeePicture();
        // 單位
        $unit = get_class($employee)::UNIT;
        echo "<img src='$employeePicture' width='150' height='150'><br>";
        echo $employee->getEmployeeName() . "<br>";
        echo "單位 : " . $unit . "<br>";
        echo "部門 : " . $employee->getDepartment() . "<br>";
        echo $employee->getEmployeeID() . "<p></p>";
    }
}

new Client();