<?php
/**
 * Created by PhpStorm.
 * 協助類別
 * User: Jackson
 * Date: 2018/1/17
 * Time: 下午11:27
 */

include_once "UniversalConnect.php";

use Chapter12\Example\UniversalConnect;

class Secure
{
    /** @var string 編成風格 */
    private $codingStyle;
    /** @var string 公司 */
    private $company;
    /** @var array 資料包，由HTML表單的資料組成 */
    private $dataPack;
    /** @var string 要移除資料的編號 */
    private $deleteID;
    /** @var string 設備 */
    private $device;
    /** @var string 資料庫欄位 */
    private $field;
    /** @var string 程式語言 */
    private $language;
    /** @var mysqli 資料庫物件 */
    private $mysqli;
    /** @var string 新資料 */
    private $newData;
    /** @var string 舊資料 */
    private $oldData;
    /** @var string 編程人員 */
    private $programmer;
    /** @var string 平台 */
    private $platform;
    /** @var string 項目 */
    private $term;
    /** @var string 更新欄位 */
    private $updateField;

    /**
     * 以陣列的形式，將安全資料回傳給發出請求的用戶端
     *
     * @return array 資料包，由HTML表單的資料組成
     */
    public function getDataPack()
    {
        return $this->dataPack;
    }

    /**
     * 設定刪除資料
     */
    public function setDeleteData()
    {
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->deleteID = $this->mysqli->real_escape_string($_POST['id']);
        $this->dataPack = array($this->deleteID);
        $this->mysqli->close();
    }

    /**
     * 設定輸入資料
     */
    public function setInsertData()
    {
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->company = $this->mysqli->real_escape_string($_POST['company']);
        $this->programmer = $this->mysqli->real_escape_string($_POST['programmer']);
        $this->language = $this->mysqli->real_escape_string($_POST['language']);
        $this->platform = $this->mysqli->real_escape_string($_POST['platform']);
        $this->codingStyle = $this->mysqli->real_escape_string($_POST['codingStyle']);
        $this->device = $this->mysqli->real_escape_string($_POST['device']);
        $this->dataPack = array(
            $this->company,
            $this->programmer,
            $this->language,
            $this->platform,
            $this->codingStyle,
            $this->device
        );
        $this->mysqli->close();
    }

    /**
     * 設定搜尋資料
     */
    public function setSearchData()
    {
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->field = $this->mysqli->real_escape_string($_POST['field']);
        $this->term = $this->mysqli->real_escape_string($_POST['term']);
        $this->dataPack = array(
            $this->field,
            $this->term
        );
        $this->mysqli->close();
    }

    /**
     * 設定更新資料
     */
    public function setUpdateData()
    {
        $this->mysqli = (new UniversalConnect)->doConnect();
        $this->updateField = $this->mysqli->real_escape_string($_POST['field']);
        $this->oldData = $this->mysqli->real_escape_string($_POST['oldData']);
        $this->newData = $this->mysqli->real_escape_string($_POST['newData']);
        $this->dataPack = array(
            $this->updateField,
            $this->oldData,
            $this->newData
        );
        $this->mysqli->close();
    }
}