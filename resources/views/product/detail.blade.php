@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
{{languageName($product->description)}}
@endsection
@section('image')
@php
$img = json_decode($product->images);
@endphp
{{url(''.$img[0])}}
@endsection
@section('css')
@endsection
@section('js')

@endsection
@section('content')
@php
      $img = json_decode($product->images);
@endphp
<div class="wrap-main w-clear">
   <div class="grid-pro-detail w-clear">
      <div class="left-pro-detail w-clear">
         <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="{{$img[0]}}" title="{{languageName($product->name)}}">
            <img src="{{$img[0]}}" alt="{{languageName($product->name)}}">
         </a>
         <div class="gallery-thumb-pro">
            <div class=" slick-img-thumb">
               @foreach ($img as $key => $item)
               <a class="thumb-pro-detail" data-zoom-id="Zoom-{{$key+1}}" href="{{$item}}" title="{{languageName($product->name)}}">
                  <img src="{{$item}}" alt="{{languageName($product->name)}}">
               </a>
               @endforeach
            </div>
         </div>
      </div>
      <div class="right-pro-detail w-clear">
         <p class="title-pro-detail">{{languageName($product->name)}}</p>
         <div class="desc-pro-detail">
            {!!languageName($product->description)!!}
         </div>
         <ul class="attr-pro-detail">
            <li class="w-clear">
               <label class="attr-label-pro-detail">Giá:</label>
               <div class="attr-content-pro-detail">
                  <span class="price-new-pro-detail">{{$product->price > 0 ? number_format($product->price-($product->price*($product->discount/100))).'đ' : 'Liên hệ'}}</span>
               </div>
            </li>
            <li class="w-clear">
               <a class="button transition" href="tel:{{$setting->phone1}}" title="{{languageName($product->name)}}">Đặt hàng ngay</a>
            </li>
         </ul>
      </div>
      <div class="clear"></div>
      <div class="tags-pro-detail w-clear">
      </div>
      <br>
      <div class="clear"></div>
      <div class="tabs-pro-detail">
         <ul class="ul-tabs-pro-detail w-clear">
            <li class="active transition" data-tabs="info-pro-detail">Thông tin sản phẩm</li>
         </ul>
         <div class="content-tabs-pro-detail info-pro-detail active">
            {!!languageName($product->content)!!}
         </div>
      </div>
   </div>
   <div class="title-main"><span class="name">Sản phẩm cùng loại</span></div>
   <div class="content-main w-clear">
      <div class="d-flex col_4">
         @foreach ($productlq as $item)
         @include('layouts.product.item',['pro'=>$item])
         @endforeach
      </div>
      <div class="clear"></div>
      <div class="pagination-home"></div>
   </div>
</div>
@endsection

