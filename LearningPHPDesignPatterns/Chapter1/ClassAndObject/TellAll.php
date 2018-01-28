<?php
/**
 * Created by PhpStorm.
 * 單一任務原則
 * User: Jackson
 * Date: 2017/12/27
 * Time: 上午9:15
 */

class TellAll
{
    /** @var string 使用者代理資訊 */
    private $userAgent;

    public function __construct()
    {
        $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
        echo $this->userAgent;
    }
}

$tellAll = new TellAll();