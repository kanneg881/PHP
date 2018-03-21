<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/9
 * Time: 上午8:57
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
    <form action="/merchandise/{{$merchandise->id}}" method="post"
          enctype="multipart/form-data">
        {{-- 隱藏方法欄位 --}}
        {{method_field('PUT')}}
        <label>
            商品狀態 :
            <select name="status">
                <option value="C"
                        @if(old('status', $merchandise->status) == 'C')
                        selected
                        @endif>
                    建立中
                </option>
                <option value="S"
                        @if(old('status', $merchandise->status) == 'S')
                        selected
                        @endif>
                    可販售
                </option>
            </select>
        </label>
        <label>
            商品名稱 :
            <input type="text" name="name" placeholder="商品名稱"
                   value="{{old('name', $merchandise->name)}}">
        </label>
        <label>
            商品英文名稱 :
            <input type="text" name="name_en" placeholder="商品英文名稱"
                   value="{{old('name_en', $merchandise->name_en)}}">
        </label>
        <label>
            商品介紹 :
            <input type="text" name="introduction" placeholder="商品介紹"
                   value="{{old('introduction', $merchandise->introduction)}}">
        </label>
        <label>
            商品英文介紹 :
            <input type="text" name="introduction_en" placeholder="商品英文介紹"
                   value="{{old('introduction_en', $merchandise->introduction_en)}}">
        </label>
        <label>
            商品照片 :
            <input type="file" name="photo" placeholder="商品照片">
            <img src="{{$merchandise->photo or
             '/assets/images/defaultMerchandise.png'}}"/>
        </label>
        <label>
            商品價格 :
            <input type="text" name="price" placeholder="商品價格"
                   value="{{old('price', $merchandise->price)}}">
        </label>
        <label>
            商品剩餘數量 :
            <input type="text" name="remain_count" placeholder="商品剩餘數量"
                   value="{{old('remain_count', $merchandise->remain_count)}}">
        </label>
        <button type="submit" class="btn btn-default">更新商品資訊</button>
        {{-- 自動產生 csrf_token 隱藏欄位 --}}
        {{csrf_field()}}
    </form>
@endsection