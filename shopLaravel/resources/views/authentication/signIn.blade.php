<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/2
 * Time: 下午7:27
 */
?>
{{-- 指定繼承 layout.master 母模板 --}}
@extends('layout.master')
{{-- 傳送資料到母模板，並指定變數 title --}}
@section('title', $title)
{{-- 傳送資料到母模板，並指定變數 content --}}
@section('content')
    <h1>{{$title}}</h1>
    {{-- 錯誤訊息模板元件 --}}
    @include('components.validationErrorMessage')
    {{-- 載入元件模板 社群按鈕 --}}
    @include('components.socialButtons')
    <form action="/user/authentication/sign-in" method="post">
        <label>
            Email :
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
        </label>
        <label>
            密碼 :
            <input type="password" name="password" placeholder="密碼"
                   value="{{old('password')}}">
        </label>
        <button type="submit">登入</button>
        {{-- 自動產生 csrf_token 隱藏欄位 --}}
        {!! csrf_field() !!}
    </form>
@endsection
