<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/2
 * Time: 下午7:14
 */
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Shop Laravel</title>
    <script src="/assets/js/jquery-3.3.1.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script src="/assets/js/js.cookie.js" defer></script>
    <script src="/assets/js/shopLaravel.js" defer></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/fontawesome.min.css">
</head>
<body>
<header>
    <ul class="nav">
        <span class="setLanguage" data-language="zh-TW">中文</span>
        <span class="setLanguage" data-language="en">English</span>
        @if(session()->has('userID'))
            <li>
                <a href="#">{{trans('shop.transaction.name')}}</a>
                <ul>
                    <li>
                        <a href="/transaction">{{trans('shop.transaction.list')}}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">{{trans('shop.merchandise.name')}}</a>
                <ul>
                    <li>
                        <a href="/merchandise/create">
                            {{trans('shop.merchandise.create')}}
                        </a>
                    </li>
                    <li>
                        <a href="/merchandise/manage">
                            {{trans('shop.merchandise.manage')}}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/user/authentication/sign-out">
                    {{trans('shop.authentication.sign-out')}}
                </a>
            </li>
        @else
            <li>
                <a href="/user/authentication/sign-in">
                    {{trans('shop.authentication.sign-in')}}
                </a>
            </li>
            <li>
                <a href="/user/authentication/facebook-sign-in">
                    {{trans('shop.authentication.facebook-sign-in')}}
                </a>
            </li>
            <li>
                <a href="/user/authentication/sign-up">
                    {{trans('shop.authentication.sign-up')}}
                </a>
            </li>
        @endif
    </ul>
</header>
<div class="container">
    @yield('content')
</div>
<footer>
    <a href="#">聯絡我們</a>
</footer>
</body>
</html>
