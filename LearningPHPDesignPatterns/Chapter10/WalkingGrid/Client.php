<?php
/**
 * Created by PhpStorm.
 * 用戶端
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午11:39
 */

namespace Chapter10\WalkingGrid;

include_once "Context.php";

use Context;

class Client
{
    /** @var Context Context物件 */
    private $context;

    public function __construct()
    {
        $this->context = new Context();
        $this->context->doUp();
        $this->context->doRight();
        $this->context->doDown();
        echo "<br>";
        $this->context->doDown();
        $this->context->doLeft();
        $this->context->doUp();
    }
}

new Client();