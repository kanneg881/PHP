<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/1
 * Time: 下午1:36
 */

namespace App\Http\Controllers;

use App\Jobs\SendSignUpMailJob;
use App\Shop\Entity\User;
use Hash;
use Illuminate\Mail\Message;
use Mail;
use Socialite;
use Validator;


class UserAuthenticationController extends Controller
{
    /**
     * Facebook 登入重新導向授權資料處理
     *
     * @return \Illuminate\Http\RedirectResponse
     * 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
     */
    public function facebookSignInCallbackProcess()
    {
        if (request()->error == 'access_denied') {
            trigger_error('授權失敗，存取錯誤');
        }
        // 依照網域產出重新導向連結（來驗證是否為發出時同一 callback）
        /** @var mixed $redirectUrl 環境變數 */
        $redirectUrl = env('FB_REDIRECT');
        /** @var mixed $facebookUser 取得第三方使用者資料 */
        $facebookUser = Socialite::driver('facebook')
            ->fields([
                'name',
                'email',
                'gender',
                'verified',
                'link',
                'first_name',
                'last_name',
                'locale',
            ])
            ->redirectUrl($redirectUrl)->user();
        /** @var string $facebookEmail Facebook Email */
        $facebookEmail = $facebookUser->email;

        if (is_null($facebookEmail)) {
            trigger_error('未授權取得使用者 Email');
        }
        /** @var string $facebookID Facebook ID */
        $facebookID = $facebookUser->id;
        /** @var string $facebookName Facebook 姓名 */
        $facebookName = $facebookUser->name;
        /** @var User $user 取得使用者資料是否有此 Facebook ID 資料 */
        $user = (new User)->where('facebook_id', $facebookID)->first();

        if (is_null($user)) {
            // 沒有綁定 Facebook ID 的帳號，透過 Email 尋找是否有此帳號
            $user = (new User)->where('email', $facebookEmail)->first();

            if (!is_null($user)) {
                // 有此帳號，綁定 Facebook ID
                $user->facebook_id = $facebookID;
                $user->save();
            }
        }

        if (is_null($user)) {
            /** @var array $input 尚未註冊 */
            $input = [
                // email
                'email' => $facebookEmail,
                // 暱稱
                'nickname' => $facebookName,
                // 隨機產生密碼
                'password' => uniqid(),
                // Facebook ID
                'facebook_id' => $facebookID,
                // 一般使用者
                'type' => 'G',
            ];
            // 密碼加密
            $input['password'] = Hash::make($input['password']);
            // 新增會員資料
            $user = User::create($input);

            /** @var array $mail_binding 寄送註冊通知信 */
            $mail_binding = [
                'nickname' => $input['nickname']
            ];

            Mail::send('email.signUpEmailNotification', $mail_binding,
                function (Message $mail) use ($input) {
                    $mail->to($input['email']);
                    $mail->from('kanneg881@gmail.com');
                    $mail->subject('恭喜註冊 Shop Laravel 成功');
                }
            );
        }

        /**
         * 登入會員
         * session 紀錄會員編號
         */
        session()->put('userID', $user->id);

        return redirect()->intended('/');
    }

    /**
     * Facebook 登入
     *
     * @return mixed 重新導向Facebook授權的網址
     */
    public function facebookSignInProcess()
    {
        /** @var mixed $redirectUrl 環境變數 */
        $redirectUrl = env('FB_REDIRECT');

        return Socialite::driver('facebook')->scopes(['user_friends'])
            ->redirectUrl($redirectUrl)->redirect();
    }

    /**
     * 登入頁
     *
     * @return \View
     */
    public function signInPage()
    {
        /** @var array $binding 顯示頁資料 */
        $binding = [
            'title' => '登入',
        ];

        return view('authentication.signIn', $binding);
    }

    /**
     * 處理登入資料
     *
     * @return mixed
     */
    public function signInProcess()
    {
        /** @var array $input 接收輸入資料 */
        $input = request()->all();
        /** @var array $rules 驗證規則 */
        $rules = [
            // Email
            'email' => ['required', 'max:150', 'email',],
            // 密碼
            'password' => ['required', 'min:6',],
        ];
        /** @var \Illuminate\Validation\Validator $validator 驗證資料 */
        $validator = Validator::make($input, $rules);

        // 驗證錯誤
        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/authentication/sign-in')->withErrors($validator)
                ->withInput();
        }
        /** @var User $user 使用者資料 */
        $user = (new User)->where('email', $input['email'])->firstOrFail();

        /** @var bool $isPasswordCorrect 檢查密碼是否正確 */
        $isPasswordCorrect = Hash::check($input['password'], $user->password);

        if (!$isPasswordCorrect) {
            /** @var array $errorMessage 錯誤訊息 */
            $errorMessage = [
                'msg' => ['密碼驗證錯誤'],
            ];
            return redirect('/user/authentication/sign-in')->withErrors($errorMessage)
                ->withInput();
        }
        // session 記錄會員編號
        session()->put('userID', $user->id);

        // 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
        return redirect()->intended('/');
    }

    /**
     *
     */
    public function signOut()
    {
        // 清除 Session
        session()->forget('userID');

        // 重新導向回首頁
        return redirect('/');
    }

    /**
     * 註冊頁
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View 註冊頁
     */
    public function signUpPage()
    {
        /** @var array $data 顯示頁資料 */
        $data = [
            'title' => '註冊',
        ];

        return view('authentication.signUp', $data);
    }

    /**
     * 處理會員註冊
     *
     * @return mixed 重新導向到某一頁
     */
    public function signUpProcess()
    {
        /** @var array $input 接收輸入資料 */
        $input = request()->all();
        /** @var array $rules 驗證規則 */
        $rules = [
            // 暱稱
            'nickname' => ['required', 'max:50',],
            // Email
            'email' => ['required', 'max:150', 'email',],
            // 密碼
            'password' => ['required', 'same:password_confirmation', 'min:6',],
            // 密碼
            'password_confirmation' => ['required', 'min:6',],
            // 帳號類型
            'type' => ['required', 'in:G,A',],
        ];
        /** @var \Illuminate\Validation\Validator $validator 驗證資料 */
        $validator = Validator::make($input, $rules);

        // 驗證錯誤
        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/authentication/sign-up')->withErrors($validator)
                ->withInput();
        }
        // 密碼加密
        $input['password'] = Hash::make($input['password']);

        // 新增會員資料
        User::create($input);

        // 寄送註冊通知信
        $mailBinging = [
            'nickname' => $input['nickname'],
            'email' => $input['email'],
        ];

        // 寄送註冊成功通知信，工作事項記錄的位置名稱設定為 high
        SendSignUpMailJob::dispatch($mailBinging)->onQueue('high');

        // 重新導向到登入頁
        return redirect('/user/authentication/sign-in');
    }
}