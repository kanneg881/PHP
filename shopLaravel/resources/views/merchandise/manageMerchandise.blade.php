<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/12
 * Time: 上午8:56
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
            <th>編號</th>
            <th>名稱</th>
            <th>圖片</th>
            <th>狀態</th>
            <th>價格</th>
            <th>剩餘數量</th>
            <th>編輯</th>
        </tr>
        @foreach($merchandisePaginate as $merchandise)
            <tr>
                <td>{{$merchandise->id}}</td>
                <td>{{$merchandise->name}}</td>
                <td>
                    <img src="{{$merchandise->photo or
                     '/assets/images/defaultMerchandise.png'}}">
                </td>
                <td>
                    @if($merchandise->status == 'C')
                        建立中
                    @else
                        可販售
                    @endif
                </td>
                <td>{{$merchandise->price}}</td>
                <td>{{$merchandise->remain_count}}</td>
                <td><a href="/merchandise/{{$merchandise->id}}/edit">編輯</a></td>
            </tr>
        @endforeach
    </table>
    {{-- 分頁頁數按鈕 --}}
    {{$merchandisePaginate->links()}}
@endsection
