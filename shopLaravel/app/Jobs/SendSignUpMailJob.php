<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Message;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendSignUpMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var array 發送信件資料 */
    protected $mailBinding;

    /**
     * Create a new job instance.
     *
     * @param array $mailBinding 發送信件資料
     */
    public function __construct($mailBinding)
    {
        $this->mailBinding = $mailBinding;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailBinding = $this->mailBinding;

        Mail::send(
            'email.signUpEmailNotification',
            $mailBinding,
            function (Message $mail) use ($mailBinding) {
                $mail->to($mailBinding['email']);
                $mail->from('kanneg881@gmail.com');
                $mail->subject('恭喜註冊 Shop Laravel 成功');
            }
        );
    }
}
