<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/2
 * Time: 上午8:55
 */

namespace App\Http\Controllers;

use App\Shop\Entity\Transaction;

class TransactionController extends Controller
{
    public function transactionListPage()
    {
        /** @var int $userID 取得登入會員資料 */
        $userID = session()->get('userID');
        /** @var int $rowPerPage 每頁資料量 */
        $rowPerPage = 10;
        /**
         * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $transactionPaginate
         * 撈取商品分頁資料
         */
        $transactionPaginate = (new Transaction)->where('user_id', $userID)
            ->OrderBy('created_at', 'desc')
            ->with('Merchandise')
            ->paginate($rowPerPage);

        /**
         * 設定商品圖片網址
         */
        foreach ($transactionPaginate as &$transaction) {
            if (!is_null($transaction->Merchandise->photo)) {
                // 設定商品照片網址
                $transaction->Merchandise->photo = url($transaction->Merchandise->photo);
            }
        }

        /** @var array $binding 傳送到畫面的資料 */
        $binding = [
            'title' => '交易紀錄',
            'transactionPaginate' => $transactionPaginate,
        ];

        return view('transaction.listUserTransaction', $binding);
    }
}