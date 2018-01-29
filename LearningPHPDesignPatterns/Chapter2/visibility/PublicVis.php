<?php
/**
 * Created by PhpStorm.
 * 公用範例
 * User: Jackson
 * Date: 2017/12/30
 * Time: 上午3:05
 */

class PublicVis
{
    /** @var string 密碼 */
    private $password;

    /**
     * 芝麻開門
     *
     * @param string $someData 某些資料
     */
    private function openSesame($someData)
    {
        $this->password = $someData;

        if ($this->password == "secret") {
            echo "你進入了!<br>";
            return;
        }

        echo "釋放獵犬!<br>";
    }

    /**
     * 透過公開的函式，去呼叫私有的函式
     *
     * @param string $safe 安全碼
     */
    public function unlock($safe)
    {
        $this->openSesame($safe);
    }
}

$worker = new PublicVis();
$worker->unlock("secret");
$worker->unlock("duh");