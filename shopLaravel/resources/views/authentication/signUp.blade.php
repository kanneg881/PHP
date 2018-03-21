<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/2
 * Time: 下午7:01
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
    <form action="/user/authentication/sign-up" method="post">
        <label>
            暱稱 :
            <input type="text" name="nickname" placeholder="暱稱" value="{{old('nickname')}}">
        </label>
        <label>
            Email :
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
        </label>
        <label>
            密碼 :
            <input type="password" name="password" placeholder="密碼">
        </label>
        <label>
            確認密碼 :
            <input type="password" name="password_confirmation" placeholder="確認密碼">
        </label>
        <label>
            帳號類型 :
            <select name="type">
                <option value="G">一般會員</option>
                <option value="A">管理員</option>
            </select>
        </label>
        {{-- 自動產生 csrf_token 隱藏欄位 --}}
        {!! csrf_field() !!}
        <button type="submit">註冊</button>
    </form>
@endsection
