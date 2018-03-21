<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/1
 * Time: 下午7:17
 */

namespace App\Http\Controllers;

use App\Shop\Entity\Merchandise;
use App\Shop\Entity\Transaction;
use App\Shop\Entity\User;
use DB;
use Exception;
use Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Validator;

class MerchandiseController extends Controller
{
    /**
     * 新增商品
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * 重新導向至商品編輯頁
     */
    public function merchandiseCreateProcess()
    {
        /** @var array $merchandiseData 初始化商品資料 */
        $merchandiseData = [
            // 建立中
            'status' => 'C',
            // 商品名稱
            'name' => '',
            // 商品英文名稱
            'name_en' => '',
            // 商品介紹
            'introduction' => '',
            // 商品英文介紹
            'introduction_en' => '',
            // 商品照片
            'photo' => null,
            // 價格
            'price' => 0,
            // 商品剩餘數量
            'remain_count' => 0,
        ];
        /** @var Merchandise $merchandise 商品資料表 */
        $merchandise = Merchandise::create($merchandiseData);

        // 重新導向至商品編輯頁
        return redirect('/merchandise/' . $merchandise->id . '/edit');
    }

    /**
     * 處理購買商品項目
     *
     * @param int $merchandiseID 商品編號
     * @return $this 重新整理附上交易訊息
     */
    public function merchandiseItemBuyProcess($merchandiseID)
    {
        /** @var array $input 接收輸入資料 */
        $input = request()->all();
        /** @var array $rules 驗證規則 */
        $rules = [
            // 商品購買數量
            'buyCount' => ['required', 'integer', 'min:1',],
        ];
        /** @var \Illuminate\Validation\Validator $validator 驗證資料 */
        $validator = Validator::make($input, $rules);

        // 資料驗證錯誤
        if ($validator->fails()) {
            return redirect('/merchandise/' . $merchandiseID)
                ->withErrors($validator)->withInput();
        }

        try {
            /** @var int $userID 取得登入會員資料 */
            $userID = session()->get('userID');
            /** @var User $user session 有會員編號，取得會員資料 */
            $user = User::findOrFail($userID);

            // 交易開始
            DB::beginTransaction();

            /** @var Merchandise $merchandise 商品資料表 */
            $merchandise = Merchandise::findOrFail($merchandiseID);
            /** @var int $buyCount 購買數量 */
            $buyCount = $input['buyCount'];
            /** @var int $remainCountAfterBuy 購買後剩餘數量 */
            $remainCountAfterBuy = $merchandise->remain_count - $buyCount;

            // 購買後剩餘數量小於0，不足以賣給使用者
            if ($remainCountAfterBuy < 0) {
                throw new Exception('商品數量不足，無法購買');
            }
            // 紀錄購買後剩餘數量
            $merchandise->remain_count = $remainCountAfterBuy;
            $merchandise->save();

            /** @var int $totalPrice 總金額：總購買數量 * 商品價格 */
            $totalPrice = $buyCount * $merchandise->price;
            /** @var array $transactionData 交易資料 */
            $transactionData = [
                'user_id' => $user->id,
                'merchandise_id' => $merchandise->id,
                'price' => $merchandise->price,
                'buy_count' => $buyCount,
                'total_price' => $totalPrice,
            ];
            // 建立交易資料
            Transaction::create($transactionData);

            // 交易結束
            DB::commit();

            /** @var array $message 購物成功訊息 */
            $message = [
                'msg' => ['購買成功',],
            ];

            return redirect()->to('/merchandise/' . $merchandise->id)
                ->withErrors($message);

        } catch (Exception $exception) {
            // 恢復原先交易狀態
            DB::rollBack();

            /** @var array $message 錯誤訊息 */
            $message = [
                'msg' => [$exception->getMessage(),],
            ];

            return redirect()->back()->withErrors($message)->withInput();
        }
    }

    /**
     * 商品項目編輯頁
     *
     * @param int $merchandiseID 商品編號
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 顯示商品項目編輯頁
     */
    public function merchandiseItemEditPage($merchandiseID)
    {
        /** @var Merchandise $merchandise 商品資料表 */
        $merchandise = Merchandise::findOrFail($merchandiseID);

        if (!is_null($merchandise->photo)) {
            // 設定商品照片網址
            $merchandise->photo = url($merchandise->photo);
        }

        /** @var array $binding 顯示頁資料 */
        $binding = [
            'title' => '編輯商品',
            'merchandise' => $merchandise,
        ];

        return view('merchandise.editMerchandise', $binding);
    }

    /**
     * 商品項目頁
     *
     * @param int $merchandiseID 商品編號
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 顯示商品項目頁
     */
    public function merchandiseItemPage($merchandiseID)
    {
        /** @var Merchandise $merchandise 撈取商品資料 */
        $merchandise = Merchandise::findOrFail($merchandiseID);

        if (!is_null($merchandise->photo)) {
            // 設定商品照片網址
            $merchandise->photo = url($merchandise->photo);
        }

        /** @var array $binding 傳送到畫面的資料 */
        $binding = [
            'title' => '商品頁',
            'merchandise' => $merchandise,
        ];

        return view('merchandise.showMerchandise', $binding);
    }

    /**
     * 商品項目更新處理
     *
     * @param int $merchandiseID 商品編號
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     * 重新導向到商品編輯頁
     */
    public function merchandiseItemUpdateProcess($merchandiseID)
    {
        /** @var Merchandise $merchandise 撈取商品資料 */
        $merchandise = Merchandise::findOrFail($merchandiseID);
        /** @var array $input 接收輸入資料 */
        $input = request()->all();
        /** @var array $rules 驗證規則 */
        $rules = [
            // 商品狀態
            'status' => ['required', 'in:C,S',],
            // 商品名稱
            'name' => ['required', 'max:80',],
            // 商品英文名稱
            'name_en' => ['required', 'max:80',],
            // 商品介紹
            'introduction' => ['required', 'max:2000',],
            // 商品英文介紹
            'introduction_en' => ['required', 'max:2000',],
            // 商品照片，上限10MB
            'photo' => ['file', 'image', 'max:10240',],
            // 商品價格
            'price' => ['required', 'integer', 'min:0',],
            // 商品剩餘數量
            'remain_count' => ['required', 'integer', 'min:0',],
        ];
        /** @var \Illuminate\Validation\Validator $validator 驗證資料 */
        $validator = Validator::make($input, $rules);

        // 資料驗證錯誤
        if ($validator->fails()) {
            return redirect('/merchandise/' . $merchandise->id . '/edit')
                ->withErrors($validator)->withInput();
        }

        // 有上傳圖片
        if (isset($input['photo'])) {
            /** @var UploadedFile $photo 圖片 */
            $photo = $input['photo'];
            /** @var string $fileExtension 檔案副檔名 */
            $fileExtension = $photo->getClientOriginalExtension();
            /** @var string $fileName 產生自訂隨機檔案名稱 */
            $fileName = uniqid() . '.' . $fileExtension;
            /** @var string $fileRelativePath 檔案相對路徑 */
            $fileRelativePath = 'assets/images/merchandise/' . $fileName;
            /** @var string $filePath 檔案存放目錄為對外公開 public 目錄下的相對位置 */
            $filePath = public_path($fileRelativePath);
            Image::make($photo)->fit(450, 300)->save($filePath);
            // 設定圖片檔案相對位置
            $input['photo'] = $fileRelativePath;
        }
        // 更新商品資料表
        $merchandise->update($input);

        return redirect('/merchandise/' . $merchandise->id . '/edit');
    }

    /**
     * 商品清單頁
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 顯示商品清單頁
     */
    public function merchandiseListPage()
    {
        /** @var int $rowPerPage 每頁資料量 */
        $rowPerPage = 10;
        /**
         * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $merchandisePaginate
         * 撈取商品分頁資料
         */
        $merchandisePaginate = (new Merchandise)
            ->OrderBy('updated_at', 'desc')
            // 可販售
            ->where('status', 'S')
            ->paginate($rowPerPage);

        /**
         * 設定商品圖片網址
         *
         * @var Merchandise $merchandise 商品資料表
         */
        foreach ($merchandisePaginate as &$merchandise) {
            if (!is_null($merchandise->photo)) {
                // 設定商品照片網址
                $merchandise->photo = url($merchandise->photo);
            }
        }

        /** @var array $binding 傳送到畫面的資料 */
        $binding = [
            'title' => '商品列表',
            'merchandisePaginate' => $merchandisePaginate,
        ];

        return view('merchandise.listMerchandise', $binding);
    }

    /**
     * 商品管理清單檢視
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 輸出商品管理清單頁面
     */
    public function merchandiseManageListPage()
    {
        /** @var int $rowPerPage 每頁資料量 */
        $rowPerPage = 10;
        /**
         * @var \Illuminate\Contracts\Pagination\LengthAwarePaginator
         * $merchandisePaginate 撈取商品分頁資料
         */
        $merchandisePaginate = (new Merchandise)
            ->OrderBy('created_at', 'desc')
            ->paginate($rowPerPage);

        /**
         * 設定商品圖片網址
         *
         * @var Merchandise $merchandise 商品資料表
         */
        foreach ($merchandisePaginate as &$merchandise) {
            if (!is_null($merchandise->photo)) {
                // 設定商品照片網址
                $merchandise->photo = url($merchandise->photo);
            }
        }

        /** @var array $binding 傳送到畫面的資料 */
        $binding = [
            'title' => '管理商品',
            'merchandisePaginate' => $merchandisePaginate,
        ];

        return view('merchandise.manageMerchandise', $binding);
    }
}