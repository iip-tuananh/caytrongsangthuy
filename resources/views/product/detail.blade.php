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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<style>
   .swiper {
   width: 100%;
   height: 100%;
   }

   .swiper-slide {
   text-align: center;
   font-size: 18px;
   background: #fff;

   /* Center slide text vertically */
   display: -webkit-box;
   display: -ms-flexbox;
   display: -webkit-flex;
   display: flex;
   -webkit-box-pack: center;
   -ms-flex-pack: center;
   -webkit-justify-content: center;
   justify-content: center;
   -webkit-box-align: center;
   -ms-flex-align: center;
   -webkit-align-items: center;
   align-items: center;
   }

   .swiper-slide img {
   display: block;
   width: 100%;
   height: 100%;
   object-fit: cover;
   }

   .swiper {
   width: 100%;
   height: 300px;
   margin-left: auto;
   margin-right: auto;
   }

   .swiper-slide {
   background-size: cover;
   background-position: center;
   }

   .mySwiper2 {
   height: 80%;
   width: 100%;
   }

   .mySwiper {
   height: 20%;
   box-sizing: border-box;
   padding: 10px 0;
   }

   .mySwiper .swiper-slide {
   width: 25%;
   height: 100%;
   opacity: 0.4;
   }

   .mySwiper .swiper-slide-thumb-active {
   opacity: 1;
   }

   .swiper-slide img {
   display: block;
   width: 100%;
   height: 100%;
   object-fit: cover;
   }
</style>
@endsection
@section('js')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
   var swiper = new Swiper(".mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
   });
   var swiper2 = new Swiper(".mySwiper2", {
      spaceBetween: 10,
      navigation: {
         nextEl: ".swiper-button-next",
         prevEl: ".swiper-button-prev",
      },
      thumbs: {
         swiper: swiper,
      },
   });
</script>
@endsection
@section('content')
@php
      $img = json_decode($product->images);
@endphp
<div class="wrap-main w-clear">
   <div class="grid-pro-detail w-clear">
      <div class="left-pro-detail w-clear">
         <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2" >
            <div class="swiper-wrapper">
               @foreach ($img as $key => $item)
               <div class="swiper-slide">
                  <img src="{{$item}}" />
               </div>
               @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
         </div>
         <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
               @foreach ($img as $key => $item)
               <div class="swiper-slide">
                  <img src="{{$item}}" />
               </div>
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

