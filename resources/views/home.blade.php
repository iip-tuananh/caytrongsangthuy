@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="slideshow">
   <div class="w_1200">
      <div class="mid">
         <div class="slick_1">
            @foreach ($banner as $item)
            <div class="item">
               <a href="{{$item->link}}" target="_blank" title="{{$item->link}}">
               <img src="{{$item->image}}" alt="{{$item->link}}" title="{{$item->link}}" loading="lazy"/>
               </a>
            </div>
            @endforeach
         </div>
      </div>
      {{-- <div class="left">
         <div class="slick_1">
            @foreach ($bannerads as $item)
            <div class="item">
               <a href="{{$item->link}}" target="_blank" title={{$item->image}}">
               <img src="{{$item->image}}" alt="{{$item->image}}" title="{{$item->image}}"/>
               </a>
            </div>
            @endforeach
            
            
         </div>
      </div> --}}
   </div>
</div>
<div class="thongso">
   <div class=" wrap-content">
      <div class="slick_4 slick_pad_10">
         <div class="item">
            <div class="box-tc  d-flex">
               <div class="images">
                  <img src="{{url('frontend/images/45-45-1-2166.png')}}" alt="" title="" loading="lazy"/>
               </div>
               <div class="info">
                  <div class="name text-split">BẢO HÀNH DÀI HẠN</div>
                  <p style="margin: 0;">Đến Khi Cây Phát Triển</p>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="box-tc box-r d-flex">
               <div class="images">
                  <img src="{{url('frontend/images/45-45-2-8792.png')}}" alt="" title="" loading="lazy"/>
               </div>
               <div class="info">
                  <div class="name text-split">Giao hàng siêu tốc
                  </div>
                  <p style="margin: 0;">Vườn ươm rộng khắp</p>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="box-tc  d-flex">
               <div class="images">
                  <img src="{{url('frontend/images/45-45-3-2687.png')}}" alt="" title="" loading="lazy"/>
               </div>
               <div class="info">
                  <div class="name text-split">TƯ VẤN MIỄN PHÍ</div>
                  <p style="margin: 0;">Đội ngũ tư vấn tận tình</p>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="box-tc box-r d-flex">
               <div class="images">
                  <img src="{{url('frontend/images/45-45-4-1636.png')}}" alt="" title="" loading="lazy" />
               </div>
               <div class="info">
                  <div class="name text-split">THANH TOÁN TIỆN LỢI</div>
                  <p style="margin: 0;">Thanh toán khi nhận hàng</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- <div class="sanpham">
   <div class="wrap-content">
      <div class="title-main w-clear">
         <span class="name paging-product-category title_tab active" data-pp="8" data-noibat="moi" data-type="san-pham" data-list="0" data-cat="0" data-cont=".paging-product-category-0">Sản phẩm bán chạy</span>
         
      </div>
      <div class="paging-product-category-0">
         <div class="d-flex col_4">
            @foreach ($spbanchay as $item)
                @include('layouts.product.item',['pro'=>$item])
            @endforeach
         </div>
      </div>
   </div>
</div> --}}
<div class="tintuc">
   <div class=" wrap-content">
      <div class="title-main">
         <div class="name">Dịch vụ</div>
      </div>
      <div class="content-main w-clear">
         <div class="d-flex col_4">
            @foreach ($servicehome as $item)
            <div class="box-product text-decoration-none w-clear">
               <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">
                  <div class="pic-product scale-img images"><img src="{{$item->image}}" alt="{{$item->name}}" loading="lazy"></div>
               </a>
               <div class="w-clear info">
                  <a href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">
                     <h3 class="name-product text-split">{{$item->name}}</h3>
                  </a>
                  <div class="text-center"><a class="button transition" href="{{route('serviceDetail',['slug'=>$item->slug])}}" title="{{$item->name}}">Xem thêm</a></div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="clear"></div>
      </div>
   </div>
</div>
@foreach ($categoryhome as $item)
@if (count($item->product) > 0)
<div class="sanpham">
   <div class="wrap-content">
      <div class="wrap-content">
         <div class="title-intro w-clear">
            <div class="name">{{languageName($item->name)}}</div>
            <div class="hidden">
               <span class="paging-product-category title_tab active" data-pp="8" data-noibat="noibat" data-type="san-pham" data-list="1" data-cat="0" data-cont=".paging-product-category-1"></span>
            </div>
            <div class="right">
               <a href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" class="more">Xem tất cả</a>
            </div>
         </div>
         <div class="paging-product-category-1">
            <div class="d-flex col_4">
               @foreach ($item->product as $item)
                  @include('layouts.product.item',['pro'=>$item])
               @endforeach
            </div>
         </div>
      </div>
      <div class="paging-product-category-1"></div>
   </div>
</div>
@endif
@endforeach
<div class="tintuc">
   <div class=" wrap-content">
      <div class="title-intro w-clear">
         <div class="name">Giới thiệu</div>
         {{-- <div class="right">
            <a href="video" class="more">Xem tất cả</a>
         </div> --}}
      </div>
      {{-- <div class="slick_3 slick_pad_10">
         @foreach ($video as $item)
         <div class="item">
            <div class="box-video w-clear">
               <a class="data-fancybox" href="{{$item->link}}" title="">
                  <div class="images scale-img pic-video">
                     <img src="{{$item->image}}" alt="" title=""/>
                  </div>
               </a>
            </div>
         </div>
         @endforeach
      </div> --}}
         <div class="home-about-us d-flex col_2">
            <div class="article-contact">
               {!!$aboutUs->description!!}
            </div>
            <div>
               <img src="{{$aboutUs->image}}" alt="" loading="lazy">
            </div>
         </div>
   </div>
</div>
@foreach ($blogCate as $cate)
   @if (count($cate->listBlog) > 0)
      <div class="tintuc">
         <div class=" wrap-content">
            <div class="title-main">
               <div class="name">{{languageName($cate->name)}}</div>
            </div>
            <div class="slick_4 slick_pad_10">
               @foreach ($cate->listBlog as $item)
               <div class="item">
                  <div class="newshome-best w-clear">
                     <a class="text-decoration-none" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                        <div class="pic-newshome-best scale-img images">
                           <img src="{{$item->image }}" alt="{{languageName($item->title)}}" loading="lazy">
                        </div>
                     </a>
                     <div class="info-newshome-best">
                        <a class="text-decoration-none" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                           <div class="name-newshome text-split">{{languageName($item->title)}}</div>
                        </a>
                        <div class="desc-newshome text-split">{{languageName($item->description)}}</div>
                        <div class="more-newshome">
                           <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class="button">Xem thêm</a>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   @endif
@endforeach

@endsection