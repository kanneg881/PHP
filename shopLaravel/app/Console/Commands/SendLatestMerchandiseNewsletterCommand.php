<?php

namespace App\Console\Commands;

use App\Jobs\SendMerchandiseNewsletterJob;
use App\Shop\Entity\Merchandise;
use App\Shop\Entity\User;
use Illuminate\Console\Command;

class SendLatestMerchandiseNewsletterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:sendLatestMerchandiseNewsletter {user_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[郵件]寄送最新商品電子報';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('寄送最新商品電子報(Start)');
        $this->info('撈取最新商品');

        /** @var int $totalRow 撈取最新更新 10 筆可販售商品 */
        $totalRow = 10;
        /** @var Merchandise $merchandiseCollection 商品集 */
        $merchandiseCollection = (new Merchandise)
            ->OrderBy('created_at', 'desc')
            // 可販售
            ->where('status', 'S')
            ->take($totalRow)
            ->get();
        /** @var int $rowPerPage 寄送電子信給所有會員，每次撈取1000筆會員資料 */
        $rowPerPage = 1000;
        /** @var int $page 分頁 */
        $page = 1;

        while (true) {
            // 取得分頁會員資料
            $this->comment('取得使用者資料，第 ' . $page . ' 頁，每頁 ' .
                $rowPerPage . ' 筆');
            /** @var int $skip 略過資料筆數 */
            $skip = ($page - 1) * $rowPerPage;
            /** @var User $userCollection 取得分頁會員資料 */
            $userCollection = (new User)->orderBy('id', 'asc')
                ->skip($skip)
                ->take($rowPerPage)
                ->get();

            if (!$userCollection->count()) {
                // 沒有使用者資料了，停止派送電子報
                $this->question('沒有使用者資料了，停止派送電子報');
                break;
            }

            // 派送會員電子信工作
            $this->comment('派送會員電子信（Start）');

            foreach ($userCollection as $user) {
                // 寄送最新商品電子報，工作事項記錄的位置名稱設定為 low
                SendMerchandiseNewsletterJob::dispatch($user, $merchandiseCollection)
                    ->onQueue('low');
            }
            $this->comment('派送會員電子信（End）');
            // 繼續找看看還有沒有需要寄送電子信的使用者
            $page++;
        }
        $this->info('寄送最新商品電子信（End）');
    }
}
