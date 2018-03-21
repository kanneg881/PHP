<?php
/**
 * Created by PhpStorm.
 * User: Jackson
 * Date: 2018/3/5
 * Time: 上午9:16
 */
?>

@if($errors and count($errors))
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif