<?php

namespace App\Http\Middleware;

use App\Shop\Entity\User;
use Closure;

class AuthenticationUserAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed 不是管理者，重新導向至首頁，是管理者，繼續做下個請求的處理
     */
    public function handle($request, Closure $next)
    {
        /** @var bool $is_allow_access 預設不允許存取 */
        $is_allow_access = false;
        /** @var mixed $userID 取得會員編號 */
        $userID = session()->get('userID');

        if (!is_null($userID)) {
            /** @var User $user session 有會員編號，取得會員資料 */
            $user = User::findOrFail($userID);

            if ($user->type == 'A') {
                // 是管理者，允許存取
                $is_allow_access = true;
            }
        }

        if (!$is_allow_access) {
            // 若不允許存取，重新導向至首頁
            return redirect()->to('/');
        }
        // 允許存取，繼續做下個請求的處理
        return $next($request);
    }
}
