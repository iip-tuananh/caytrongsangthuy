@extends('layouts.main.master')
@section('title')
Kết quả tìm kiếm
@endsection
@section('description')
Đã tìm thấy {{$countproduct}} kết quả phù hợp cho từ khóa "{{$keyword}}"
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/search.css')}}">
@endsection
@section('content')
<div class="main-content-wp" id="search-page">
	<div class="section" id="breadcrumb-wp">
	   <div class="inner-wp">
		  <div class="section-detail">
			 <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
				<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
				   <a itemscope="" itemtype="https://schema.org/WebPage" itemprop="item" itemid="https://canhuyhoang.net/" title="Trang chủ" href="https://canhuyhoang.net/"><span itemprop="name">Trang chủ</span></a>&nbsp;/
				   <meta itemprop="position" content="1">
				</li>
				<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
				   <span itemprop="name">Tìm kiếm với từ khóa: “{{$keyword}}”</span>
				   <meta itemprop="position" content="2">
				</li>
			 </ol>
		  </div>
	   </div>
	</div>
	<div id="wrapper">
	   <div class="inner-wp">
		  <div id="main-content">
			 <div class="section" id="search-wp">
				<div class="section-head">
					@if (count($resultPro)>0)
					<h3 class="section-title">Tìm thấy <strong>{{$countproduct}}</strong> kết quả với từ khóa <strong>"{{$keyword}}"</h3>
					@else
					<h3 class="section-title">Không tìm thấy kết quả với từ khóa <strong>"{{$keyword}}"</h3>
					@endif
				</div>
				<div class="section-detail">
				   <ul class="list-item clearfix">
					@foreach ($resultPro as $pro)
						@php
						$img = json_decode($pro['images']);
						@endphp
					  <li>
						 <a href="{{route('detailProduct',['cate'=>$pro['cate_slug'],'type'=>$pro['type_slug'] ? $pro['type_slug'] : 'loai','id'=>$pro['slug']])}}" title="{{languageName($pro['name'])}}" class="thumb">
						 <img data-src="{{$img[0]}}" alt="{{languageName($pro['name'])}}" class=" lazyloaded" width="600px" height="600px" src="{{$img[0]}}">
						 </a>
						 <div class="info">
							<a href="{{route('detailProduct',['cate'=>$pro['cate_slug'],'type'=>$pro['type_slug'] ? $pro['type_slug'] : 'loai','id'=>$pro['slug']])}}" title="{{languageName($pro['name'])}}" class="title">{{languageName($pro['name'])}}</a>
							<div class="price">{{number_format($pro['price']-($pro['price']*($pro['discount']/100)))}}đ</div>
							<a href="{{route('detailProduct',['cate'=>$pro['cate_slug'],'type'=>$pro['type_slug'] ? $pro['type_slug'] : 'loai','id'=>$pro['slug']])}}" title="Chi tiết sản phẩm" class="view-more">Chi tiết sản phẩm</a>
						 </div>
					  </li>
					@endforeach
				   </ul>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
 </div>
@endsection