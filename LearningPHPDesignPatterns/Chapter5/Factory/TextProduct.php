<?php
/**
 * Created by PhpStorm.
 * 文字產品
 * User: Jackson
 * Date: 2018/1/3
 * Time: 上午9:00
 */

namespace Chapter5;

include_once "Product.php";

class TextProduct implements Product
{
    /** @var mixed 製造商產品 */
    private $manufacturingProduct;

    /**
     * 取得製造商產品屬性
     *
     * @return mixed 製造商產品
     */
    public function getProperties()
    {
        // 開始heredoc格式化
        $this->manufacturingProduct = <<<MALI
        <!DOCTYPE html>
        <html>
        <head>
        <style type="text/css">
        header {
            color: #900;
            font-weight: bold;
            font-size: 24px;
            font-family: Verdana, Geneva, sans-serif;
        }
        p {
            font-size: 12px;
            font-family: Verdana, Geneva, sans-serif;
        }
        </style>
        <meta charset="UTF-8">
        <title>Mali</title>
        </head>
        <body>
        <header>Mali</header>
        <p>The Sudanese Republic and Senegal became independent of France in 1960 as the Mali Federation. When Senegal withdrew after only a few months, what formerly made up the Sudanese Republic was renamed Mali. Rule by dictatorship was brought to a close in 1991 by a military coup that ushered in a period of democratic rule. President Alpha KONARE won Mali's first two democratic presidential elections in 1992 and 1997. In keeping with Mali's two-term constitutional limit, he stepped down in 2002 and was succeeded by Amadou Toumani TOURE, who was elected to a second term in a 2007 election that was widely judged to be free and fair. Malian returnees from Libya in 2011 exacerbated tensions in northern Mali, and Tuareg ethnic militias rebelled in January 2012. Low- and mid-level soldiers, frustrated with the poor handling of the rebellion, overthrew TOURE on 22 March. Intensive mediation efforts led by the Economic Community of West African States (ECOWAS) returned power to a civilian administration in April with the appointment of Interim President Dioncounda TRAORE. The post-coup chaos led to rebels expelling the Malian military from the country's three northern regions and allowed Islamic militants to set up strongholds. Hundreds of thousands of northern Malians fled the violence to southern Mali and neighboring countries, exacerbating regional food shortages in host communities. An international military intervention to retake the three northern regions began in January 2013 and within a month most of the north had been retaken. In a democratic presidential election conducted in July and August of 2013, Ibrahim Boubacar KEITA was elected president. The Malian Government and northern armed groups signed an internationally-mediated peace accord in June 2015.</p>
        </body>
        </html>
MALI;
        return $this->manufacturingProduct;
    }
}