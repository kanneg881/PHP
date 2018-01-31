<?php
/**
 * Created by PhpStorm.
 * 實作產品
 * User: Jackson
 * Date: 2018/1/4
 * Time: 下午1:44
 */

include_once "FormatHelper.php";
include_once "Product.php";

use Chapter5\NewFactory\FormatHelper;
use Chapter5\NewFactory\Product;

class MoldovaProduct implements Product
{
    /** @var string html國家資料 */
    private $manufacturingProduct;
    /** @var FormatHelper 格式化輔助器物件 */
    private $formatHelper;
    /** @var string 國家內容 */
    private $countryContent;

    /**
     * 取得產品屬性
     *
     * @return string 國家資料
     */
    public function getProperties()
    {
        // 從外部文字檔載入文字寫入
        $this->countryContent = file_get_contents("CountryWriteups/Moldova.txt");

        $this->formatHelper = new FormatHelper();
        $this->manufacturingProduct = $this->formatHelper->addTop();
        $this->manufacturingProduct .= "<img src='Countries/Moldova.gif' class='pixRight'
            width='330' height='715'/>";
        $this->manufacturingProduct .= "<header>Moldova</header>";
        $this->manufacturingProduct .= "<p>$this->countryContent</p>";
        $this->manufacturingProduct .= $this->formatHelper->closeUp();

        return $this->manufacturingProduct;
    }
}