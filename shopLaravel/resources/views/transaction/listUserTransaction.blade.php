<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/14
 * Time: 下午6:18
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
            <th>商品名稱</th>
            <th>圖片</th>
            <th>單價</th>
            <th>數量</th>
            <th>總金額</th>
            <th>購買時間</th>
        </tr>
        @foreach($transactionPaginate as $transaction)
            <tr>
                <td>
                    <a href="/merchandise/{{$transaction->Merchandise->id}}">
                        {{$transaction->Merchandise->name}}
                    </a>
                </td>
                <td>
                    <a href="/merchandise/{{$transaction->Merchandise->id}}">
                        <img src="{{$transaction->Merchandise->photo or
                        '/assets/images/defaultMerchandise.png'}}">
                    </a>
                </td>
                <td>{{$transaction->price}}</td>
                <td>{{$transaction->buy_count}}</td>
                <td>{{$transaction->total_price}}</td>
                <td>{{$transaction->created_at}}</td>
            </tr>
        @endforeach
    </table>
    {{-- 分頁頁數按鈕 --}}
    {{$transactionPaginate->links()}}
@endsection
