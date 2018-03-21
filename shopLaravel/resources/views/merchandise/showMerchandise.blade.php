<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/13
 * Time: 上午9:18
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
            <td>{{$merchandise->name}}</td>
        </tr>
        <tr>
            <th>照片</th>
            <td>
                <img src="{{$merchandise->photo or
                '/assets/images/defaultMerchandise.png'}}">
            </td>
        </tr>
        <tr>
            <th>價格</th>
            <td>{{$merchandise->price}}</td>
        </tr>
        <tr>
            <th>剩餘數量</th>
            <td>{{$merchandise->remain_count}}</td>
        </tr>
        <tr>
            <th>介紹</th>
            <td>{{$merchandise->introduction}}</td>
        </tr>
        <tr>
            <td colspan="2">
                <form action="/merchandise/{{$merchandise->id}}/buy" method="post">
                    <label>
                        購買數量
                        <select name="buyCount">
                            @for($count = 0; $count <= $merchandise->remain_count; $count++)
                                <option value="{{$count}}">{{$count}}</option>
                            @endfor
                        </select>
                        <button type="submit">購買</button>
                        {{csrf_field()}}
                    </label>
                </form>
            </td>
        </tr>
    </table>
@endsection
