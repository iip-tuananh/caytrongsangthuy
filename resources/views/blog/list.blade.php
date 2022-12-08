@extends('layouts.main.master')
@section('title')
{{$title_page}} 
@endsection
@section('description')
Tin tức nổi bật và mới nhất
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
   .album-image-cate .big-image {
      width: 100%;
      height: 400px;
      margin-bottom: 20px;
      cursor: pointer;
   }
   .album-image-cate .small-image {
      width: 100%;
      height: 196px;
      margin-bottom: 10px;
      cursor: pointer;
   }
   .album-image-cate .show-image {
      padding: 0 8px;
   }
   .show-image:nth-child(4) .small-image {
      position: relative;
   }
   .show-image:nth-child(4) p {
      position: absolute;
      z-index: 99;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      height: 196px;
      text-align: center;
      padding-top: 90px;
      color: #fff;
      background-color: #000000a3;
      font-weight: 700;
      font-size: 14px;
      margin-left: 8px;
      margin-right: 8px;
      cursor: pointer;
   }
</style>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endsection
@section('content')
<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">{{$title_page}}</div>
   </div>
   @if ($status_cate == 1)
   <div class="content-main w-clear">
      @if (count($blog) > 0)
      @foreach ($blog as $item)
      <a class="news text-decoration-none w-clear" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
         <p class="pic-news scale-img"><img src="{{$item->image }}" alt="{{languageName($item->title)}}"></p>
         <div class="info-news">
            <h3 class="name-news">{{languageName($item->title)}}</h3>
            <p class="time-news">Ngày đăng: {{date_format($item->created_at,'d/m/Y')}}</p>
            <div class="desc-news text-split"></div>
         </div>
      </a>
      @endforeach
      @else
      <h3>Nội dung đang cập nhật...</h3>
      @endif
      <div class="clear"></div>
      <div class="pagination-home"> {{$blog->links()}}</div>
   </div>
   @endif
   @if ($status_cate == 2)
   @php
      $imgs = json_decode($cate->avatar);
   @endphp
   <div class="content-main w-clear">
      <div class="album-image-cate">
         <div class="row mb-4">
            <div class="col-md-6">
               <a data-src="{{$imgs[0]}}" data-fancybox="gallery">
                  <img class="big-image" src="{{$imgs[0]}}" alt="" loading="lazy" >
               </a>
            </div>
            <div class="col-md-6">
               @if (count($imgs) > 5)
                  <div class="row">
                     @for ($i = 1; $i <= 4; $i++)
                        @if ($i == 4)
                        <div class="col-md-6 col-6 show-image">
                           <a data-src="{{$imgs[$i]}}" data-fancybox="gallery">
                              <img class="small-image" src="{{$imgs[$i]}}" alt="" loading="lazy">
                              <p>XEM THÊM +{{count($imgs)-5}} ẢNH</p>
                           </a>
                        </div>
                        @else
                        <div class="col-md-6 col-6 show-image">
                           <a data-src="{{$imgs[$i]}}" data-fancybox="gallery">
                              <img class="small-image" src="{{$imgs[$i]}}" alt="" loading="lazy">
                           </a>
                        </div>
                        @endif
                     @endfor
                     @for ($i = 5; $i < count($imgs); $i++)
                        <div class="col-md-6 col-6 hidden">
                           <a data-src="{{$imgs[$i]}}" data-fancybox="gallery">
                              <img class="small-image" src="{{$imgs[$i]}}" alt="" loading="lazy">
                           </a>
                        </div>
                     @endfor
                  </div>
               @else
                  <div class="row">
                     @for ($i = 1; $i < count($imgs) ; $i++)
                        <div class="col-md-6 col-6">
                           <a data-src="{{$imgs[$i]}}" data-fancybox="gallery">
                              <img class="small-image" src="{{$imgs[$i]}}" alt="" loading="lazy">
                           </a>
                        </div>
                     @endfor
                  </div>
               @endif
            </div>
         </div>
      </div>
      {!!languageName($cate->content)!!}
   </div>
   @endif
</div>


@endsection