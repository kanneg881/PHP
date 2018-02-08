<?php
/**
 * Created by PhpStorm.
 * 具體產品1
 * User: Jackson
 * Date: 2018/1/22
 * Time: 下午12:22
 */

include_once "FormatHelper.php";
include_once "Product.php";

class ConcreteProduct1 implements Product
{
    /** @var string 國家內容 */
    private $countryContent;
    /** @var string html國家資料 */
    private $countryProduct;
    /** @var FormatHelper 格式化輔助器物件 */
    private $formatHelper;

    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties()
    {
        // 由外部文字檔載入文字
        $this->countryContent = file_get_contents(
            "../asset/concreteProduct1/clue.txt");

        $this->formatHelper = new FormatHelper();
        $this->countryProduct = $this->formatHelper->addTop();
        $this->countryProduct .= "<img src='../asset/concreteProduct1/map.gif'>";
        $this->countryProduct .= "<img class='pixLeft' 
            src='../asset/concreteProduct1/pic.jpg' width='600'>";
        $this->countryProduct .= "<p>$this->countryContent</p>";
        $this->countryProduct .= $this->formatHelper->closeup();

        return $this->countryProduct;
    }
}