<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/17
 * Time: 上午9:09
 */

namespace Chapter12\Example;

include_once "Context.php";
include_once "library/Secure.php";
include_once "model/DataInsert.php";
include_once "model/DataDelete.php";
include_once "model/DataDisplayAll.php";
include_once "model/DataSearch.php";
include_once "model/DataUpdate.php";

use DataDelete;
use DataDisplayAll;
use DataSearch;
use Secure;

class Client
{
    /**
     * 刪除資料
     */
    public function deleteData()
    {
        // Secure 物件
        $secure = new Secure();
        // Context 物件
        $context = new Context(new DataDelete());
        $secure->setDeleteData();
        $context->algorithm($secure->getDataPack());
    }

    /**
     * 顯示全部資料
     */
    public function displayAllData()
    {
        // 假資料，因為顯示資料不需要帶入任何參數
        $dummy = array(0);
        $context = new Context(new DataDisplayAll());
        $context->algorithm($dummy);
    }

    /**
     * 插入資料
     */
    public function insertData()
    {
        // Secure 物件
        $secure = new Secure();
        // Context 物件
        $context = new Context(new DataInsert());
        $secure->setInsertData();
        $context->algorithm($secure->getDataPack());
    }

    /**
     * 尋找資料
     */
    public function searchData()
    {
        // Secure 物件
        $secure = new Secure();
        // Context 物件
        $context = new Context(new DataSearch());
        $secure->setSearchData();
        $context->algorithm($secure->getDataPack());
    }

    /**
     * 更新資料
     */
    public function updateData()
    {
        // Secure 物件
        $secure = new Secure();
        // Context 物件
        $context = new Context(new DataUpdate());
        $secure->setUpdateData();
        $context->algorithm($secure->getDataPack());
    }
}