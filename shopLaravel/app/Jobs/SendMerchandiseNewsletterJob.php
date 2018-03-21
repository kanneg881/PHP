<?php

namespace App\Jobs;

use App\Shop\Entity\User;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendMerchandiseNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var User 會員資料表 */
    protected $user;
    /** @var Collection 商品集資料表 */
    protected $merchandiseCollection;

    /**
     * SendMerchandiseNewsletterJob constructor.
     *
     * @param User $user 會員資料表
     * @param Collection $merchandiseCollection 商品集資料表
     * @return void
     */
    public function __construct(User $user, Collection $merchandiseCollection)
    {
        $this->user = $user;
        $this->merchandiseCollection = $merchandiseCollection;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /** @var array $mailBinding 信件綑綁資料 */
        $mailBinding = [
            'user' => $this->user,
            'merchandiseCollection' => $this->merchandiseCollection,
        ];

        Mail::send('email.merchandiseNewsletter', $mailBinding,
            function (Message $mail) use ($mailBinding) {
                $mail->to($mailBinding['user']->email);
                $mail->from('kanneg881@gmail.com');
                $mail->subject('Shop Laravel 最新商品電子報');
            }
        );
    }
}
