<?php
/**
 * Created by PhpStorm.
 * 控制狀態改變
 * User: Jackson
 * Date: 2018/1/14
 * Time: 下午10:44
 */

include_once "Cell1State.php";
include_once "Cell2State.php";
include_once "Cell3State.php";
include_once "Cell4State.php";
include_once "Cell5State.php";
include_once "Cell6State.php";
include_once "Cell7State.php";
include_once "Cell8State.php";
include_once "Cell9State.php";

class Context
{
    /** @var Cell1State Cell1State物件 */
    private $cell1State;
    /** @var Cell2State Cell2State物件 */
    private $cell2State;
    /** @var Cell3State Cell3State物件 */
    private $cell3State;
    /** @var Cell4State Cell4State物件 */
    private $cell4State;
    /** @var Cell5State Cell5State物件 */
    private $cell5State;
    /** @var Cell6State Cell6State物件 */
    private $cell6State;
    /** @var Cell7State Cell7State物件 */
    private $cell7State;
    /** @var Cell8State Cell8State物件 */
    private $cell8State;
    /** @var Cell9State Cell9State物件 */
    private $cell9State;
    /** @var IMatrix 目前狀態 */
    private $currentState;

    public function __construct()
    {
        $this->cell1State = new Cell1State($this);
        $this->cell2State = new Cell2State($this);
        $this->cell3State = new Cell3State($this);
        $this->cell4State = new Cell4State($this);
        $this->cell5State = new Cell5State($this);
        $this->cell6State = new Cell6State($this);
        $this->cell7State = new Cell7State($this);
        $this->cell8State = new Cell8State($this);
        $this->cell9State = new Cell9State($this);

        // 初始狀態由開發者決定
        $this->currentState = $this->cell5State;
    }

    /**
     * 往下走
     */
    public function doDown()
    {
        $this->currentState->goDown();
    }

    /**
     * 往左走
     */
    public function doLeft()
    {
        $this->currentState->goLeft();
    }

    /**
     * 往右走
     */
    public function doRight()
    {
        $this->currentState->goRight();
    }

    /**
     * 往上走
     */
    public function doUp()
    {
        $this->currentState->goUp();
    }

    /**
     * 取得格子1狀態
     *
     * @return Cell1State 格子1狀態
     */
    public function getCell1State()
    {
        return $this->cell1State;
    }

    /**
     * 取得格子2狀態
     *
     * @return Cell2State 格子2狀態
     */
    public function getCell2State()
    {
        return $this->cell2State;
    }

    /**
     * 取得格子3狀態
     *
     * @return Cell3State 格子3狀態
     */
    public function getCell3State()
    {
        return $this->cell3State;
    }

    /**
     * 取得格子4狀態
     *
     * @return Cell4State 格子4狀態
     */
    public function getCell4State()
    {
        return $this->cell4State;
    }

    /**
     * 取得格子5狀態
     *
     * @return Cell5State 格子5狀態
     */
    public function getCell5State()
    {
        return $this->cell5State;
    }

    /**
     * 取得格子6狀態
     *
     * @return Cell6State 格子6狀態
     */
    public function getCell6State()
    {
        return $this->cell6State;
    }

    /**
     * 取得格子7狀態
     *
     * @return Cell7State 格子7狀態
     */
    public function getCell7State()
    {
        return $this->cell7State;
    }

    /**
     * 取得格子8狀態
     *
     * @return Cell8State 格子8狀態
     */
    public function getCell8State()
    {
        return $this->cell8State;
    }

    /**
     * 取得格子9狀態
     *
     * @return Cell9State 格子9狀態
     */
    public function getCell9State()
    {
        return $this->cell9State;
    }

    /**
     * 設定目前狀態
     *
     * @param IMatrix $state 具體IMatrix
     */
    public function setState(IMatrix $state)
    {
        $this->currentState = $state;
    }
}