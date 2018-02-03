<?php
/**
 * Created by PhpStorm.
 * 作為參與者的用戶端類別
 * User: Jackson
 * Date: 2018/1/7
 * Time: 下午10:10
 */

namespace Chapter7\DesktopToMobile;

include_once "Mobile.php";
include_once "MobileAdapter.php";

use Mobile;
use MobileAdapter;

class Client
{
    /** @var Mobile 手機版物件 */
    private $mobile;
    /** @var MobileAdapter 手機版轉接器物件 */
    private $mobileAdapter;

    public function __construct()
    {
        $this->mobile = new Mobile();
        $this->mobileAdapter = new MobileAdapter($this->mobile);
        $this->mobileAdapter->formatCSS();
        $this->mobileAdapter->formatGraphics();
        $this->mobileAdapter->horizontalLayout();
        $this->mobile->closeHTML();
    }
}

new Client();