@extends('layouts.main.master')
@section('title')
Giới thiệu
@endsection
@section('description')
Giới thiệu về chúng tôi
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="wrap-main w-clear">
    <div class="title-main">
    <div class="name">Giới thiệu</div>
    </div>
    <div class="content-main w-clear">
    {!!$gioithieu->content!!}
    </div>
</div>
@endsection