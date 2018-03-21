<?php

namespace App\Http\Middleware;

use Closure;

class DetectLanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var string $language 取得 cookie 語言設定 */
        $language = $request->cookie('shopLaravelLanguage');

        switch ($language) {
            // 語系指定為英文
            case 'en':
                app()->setLocale('en');
                break;
            // 語系指定為繁體中文
            default:
            case 'zh-TW':
                app()->setLocale('zh-TW');
                break;
        }

        return $next($request);
    }
}
