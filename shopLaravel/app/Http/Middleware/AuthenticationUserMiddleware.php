<?php

namespace App\Http\Middleware;

use App\Shop\Entity\User;
use Closure;

class AuthenticationUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed 不是會員，重新導向至登入頁，是會員，繼續做下個請求的處理
     */
    public function handle($request, Closure $next)
    {
        /** @var bool $is_allow_access 預設不允許存取 */
        $is_allow_access = false;
        /** @var mixed $userID 取得會員編號 */
        $userID = session()->get('userID');

        if (!is_null($userID)) {
            // 有會員編號資料，允許存取
            $is_allow_access = true;
        }

        if (!$is_allow_access) {
            // 若不允許存取，重新導向至登入頁
            return redirect()->to('/user/authentication/sign-in');
        }
        // 允許存取，繼續做下個請求的處理
        return $next($request);
    }
}
