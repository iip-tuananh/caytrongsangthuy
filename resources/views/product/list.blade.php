@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/list_product.css')}}">
@endsection
@section('content')
<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">{{$title}}</div>
   </div>
   <div class="content-main w-clear">
      <div class="d-flex col_4">
         @if (count($list) > 0)
         @foreach ($list as $item)
            @include('layouts.product.item',['pro'=>$item])
         @endforeach
         @else
         <h3>Nội dung đang được cập nhật...</h3>
         @endif
      </div>
      <div class="clear"></div>
      <div class="pagination-home">{{$list->links()}}</div>
   </div>
</div>
@endsection