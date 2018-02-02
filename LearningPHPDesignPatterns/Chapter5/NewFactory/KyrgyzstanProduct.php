<?php
/**
 * Created by PhpStorm.
 * 實作產品
 * User: Jackson
 * Date: 2018/1/4
 * Time: 上午9:01
 */

include_once "FormatHelper.php";
include_once "Product.php";

use Chapter5\NewFactory\FormatHelper;
use Chapter5\NewFactory\Product;

class KyrgyzstanProduct implements Product
{
    /** @var string html國家資料 */
    private $manufacturingProduct;
    /** @var FormatHelper 格式化輔助器物件 */
    private $formatHelper;

    /**
     * 取得產品屬性
     * 
     * @return string 國家資料
     */
    public function getProperties()
    {
        $this->formatHelper = new FormatHelper();
        $this->manufacturingProduct = $this->formatHelper->addTop();
        $this->manufacturingProduct .= <<<KYRGYZSTAN
        <img src='asset/image/Countries/Kyrgyzstan.gif' class='pixRight' width='633' height='321'>
        <header>Kyrgyzstan</header>
        <p>A Central Asian country of incredible natural beauty and proud nomadic traditions, most of the territory of present-day Kyrgyzstan was formally annexed to the Russian Empire in 1876. The Kyrgyz staged a major revolt against the Tsarist Empire in 1916 in which almost one-sixth of the Kyrgyz population was killed. Kyrgyzstan became a Soviet republic in 1936 and achieved independence in 1991 when the USSR dissolved. Nationwide demonstrations in 2005 and 2010 resulted in the ouster of Kyrgyzstan’s first two presidents, Askar AKAEV and Kurmanbek BAKIEV. In 2017, Almazbek ATAMBAEV became the first Kyrgyzstani president to step down after serving a full term as required in the country’s constitution. Former Prime Minister and ruling Social-Democratic Party of Kyrgyzstan member Sooronbay JEENBEKOV replaced him after winning an October 2017 presidential election that was the most competitive in Kyrgyzstan’s history, although it was marred by allegations of illicit government interference to benefit JEENBEKOV. The president holds substantial powers as head of state even though the prime minister oversees Kyrgyzstan’s government and selects most cabinet members. The president represents the country internationally and can sign or veto laws, call for new elections, and nominate supreme court judges, cabinet members for posts related to security or defense, and numerous other high-level positions. Continuing concerns for Kyrgyzstan include the trajectory of democratization, endemic corruption, poor interethnic relations, border security vulnerabilities, and potential terrorist threats.</p>
KYRGYZSTAN;

        $this->manufacturingProduct .= $this->formatHelper->closeUp();
        return $this->manufacturingProduct;
    }
}