@extends('layouts.main.master')
@section('title')
Dự án của chúng tôi
@endsection
@section('description')
Dự án của chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">Dịch vụ của chúng tôi</div>
   </div>
   <div class="content-main w-clear">
      <div class="d-flex col_4">
         @if (count($list) > 0)
         @foreach ($list as $item)
         <div class="box-product text-decoration-none w-clear">
            <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">
               <div class="pic-product scale-img images"><img src="{{$item->image}}" alt="{{$item->name}}"></div>
            </a>
            <div class="w-clear info">
               <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">
                  <h3 class="name-product text-split">{{$item->name}}</h3>
               </a>
               <div class="text-center"><a class="button transition" href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">Xem thêm</a></div>
            </div>
         </div>
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