<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午9:07
 */

namespace Chapter5\NewFactory;

include_once "CountryFactory.php";
include_once "MoldovaProduct.php";
// 可以練習呼叫看看
//include_once "KyrgyzstanProduct.php";

use CountryFactory;
// 可以練習呼叫看看
// use KyrgyzstanProduct;
use MoldovaProduct;

class Client
{
    /** @var CountryFactory 國家工廠物件 */
    private $countryFactory;

    public function __construct()
    {
        $this->countryFactory = new CountryFactory();
        echo $this->countryFactory->doFactory(new MoldovaProduct());
    }
}

new Client();