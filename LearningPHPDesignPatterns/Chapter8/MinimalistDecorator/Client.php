<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/9
 * Time: 上午8:51
 */

namespace Chapter8\MinimalistDecorator;

include_once "BasicSite.php";
include_once "Database.php";
include_once "Maintenance.php";
include_once "Video.php";

use BasicSite;
use Database;
use Maintenance;
use Video;

class Client
{
    /** @var BasicSite 基本網站元件 */
    private $basicSite;

    public function __construct()
    {
        $this->basicSite = new BasicSite();
        $this->basicSite = $this->wrapComponent($this->basicSite);
        // 網站顯示
        $siteShow = $this->basicSite->getSite();
        // 格式化
        $format = "<br>&nbsp;&nbsp;<strong>總計= $";
        // 價錢
        $price = $this->basicSite->getPrice();
        echo $siteShow . $format . $price . "</strong><p></p>";
    }

    /**
     *
     * 封裝元件
     *
     * @param IComponent $component 元件
     * @return IComponent 封裝元件
     */
    private function wrapComponent(IComponent $component)
    {
        $component = new Database($component);
        $component = new Maintenance($component);
        $component = new Video($component);
        return $component;
    }
}

new Client();