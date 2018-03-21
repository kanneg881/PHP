<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/12
 * Time: 下午7:04
 */
?>
{{-- 指定繼承 layout.master 母模板 --}}
@extends('layout.master')
{{-- 傳送資料到母模板，並指定變數為 title --}}
@section('title', $title)
{{-- 傳送資料到母模板，並指定變數為 content --}}
@section('content')
    <h1>{{$title}}</h1>
    {{-- 錯誤訊息模板元件 --}}
    @include('components.validationErrorMessage')
    <table class="table">
        <tr>
            <th>名稱</th>
            <th>照片</th>
            <th>價格</th>
            <th>剩餘數量</th>
        </tr>
        @foreach($merchandisePaginate as $merchandise)
            <tr>
                <td>
                    <a href="/merchandise/{{$merchandise->id}}">
                        {{$merchandise->name}}
                    </a>
                </td>
                <td>
                    <a href="/merchandise/{{$merchandise->id}}">
                        <img src="{{$merchandise->photo or
                        '/assets/images/defaultMerchandise.png'}}">
                    </a>
                </td>
                <td>{{$merchandise->price}}</td>
                <td>{{$merchandise->remain_count}}</td>
            </tr>
        @endforeach
    </table>
    {{-- 分頁頁數按鈕 --}}
    {{$merchandisePaginate->links()}}
@endsection
