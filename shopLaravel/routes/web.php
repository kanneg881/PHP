<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 首頁
Route::get('/', function () {
    return view('welcome');
});

// 商品
Route::group(['prefix' => 'merchandise'], function () {
    // 清單檢視
    Route::get('/', 'MerchandiseController@merchandiseListPage');
    // 資料新增
    Route::get('/create', 'MerchandiseController@merchandiseCreateProcess')
        ->middleware(['user.authentication.admin']);
    // 管理清單檢視
    Route::get('/manage', 'MerchandiseController@merchandiseManageListPage')
        ->middleware(['user.authentication.admin']);
    // 指定商品
    Route::group(['prefix' => '{merchandiseID}'], function () {
        Route::group(['middleware' => ['user.authentication.admin']], function () {
            // 資料修改
            Route::put('/', 'MerchandiseController@merchandiseItemUpdateProcess');
            // 編輯頁面檢視
            Route::get('/edit', 'MerchandiseController@merchandiseItemEditPage');
        });
        // 檢視
        Route::get('/', 'MerchandiseController@merchandiseItemPage')
            ->where(['merchandise_id' => '[0-9]+']);
        // 購買
        Route::post('/buy', 'MerchandiseController@merchandiseItemBuyProcess')
            ->middleware(['user.authentication']);
    });
});

// 使用者
Route::group(['prefix' => 'user'], function () {
    // 使用者驗證
    Route::group(['prefix' => 'authentication'], function () {
        // Facebook 登入
        Route::get('/facebook-sign-in',
            'UserAuthenticationController@facebookSignInProcess');
        // Facebook 登入重新導向授權資料處理
        Route::get('/facebook-sign-in-callback',
            'UserAuthenticationController@facebookSignInCallbackProcess');
        // 登入頁
        Route::get('/sign-in', 'UserAuthenticationController@signInPage');
        // 登入處理
        Route::post('/sign-in', 'UserAuthenticationController@signInProcess');
        // 登出
        Route::get('/sign-out', 'UserAuthenticationController@signOut');
        // 註冊頁
        Route::get('/sign-up', 'UserAuthenticationController@signUpPage');
        // 資料新增
        Route::post('/sign-up', 'UserAuthenticationController@signUpProcess');
    });
});

// 交易紀錄
Route::get('/transaction', 'TransactionController@transactionListPage')
    ->middleware(['user.authentication']);