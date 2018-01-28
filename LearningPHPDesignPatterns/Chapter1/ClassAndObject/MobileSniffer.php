<?php
/**
 * Created by PhpStorm.
 * 改良TellAll
 * User: Jackson
 * Date: 2017/12/27
 * Time: 上午9:31
 */

// 使用者代理是物件的屬性
class MobileSniffer
{
    /** @var string 使用者代理資訊 */
    private $userAgent;
    /** @var array 設備 */
    private $device;
    /** @var array 瀏覽器 */
    private $browser;

    public function __construct()
    {
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        // strtolower() 為字串轉換成小寫
        $this->userAgent = strtolower($this->userAgent);
        $this->device = array('iphone', 'ipad', 'android', 'silk', 'blackberry', 'touch');
        $this->browser = array(
            'firefox',
            'chrome',
            'opera',
            'msie',
            'safari',
            'blackberry',
            'trident'
        );
    }

    /**
     * 尋找設備
     *
     * @return string 找到回傳設備字串，找不到回傳未知
     */
    public function findDevice()
    {
        foreach ($this->device as $value) {
            // 檢查 $value 字串是否有在 $this->userAgent 裡
            if (strstr($this->userAgent, $value)) {
                return $value;
            }
        }

        return '未知';
    }

    /**
     * 尋找瀏覽器
     *
     * @return string 找到回傳瀏覽器字串，找不到回傳未知
     */
    public function findBrowser()
    {
        foreach ($this->browser as $value) {
            if (strstr($this->userAgent, $value)) {
                return $value;
            }
        }

        return '未知';
    }
}