@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">Liên hệ</div>
   </div>
   <div class="content-main w-clear">
      <div class="top-contact d-flex col_2">
         <div class="article-contact">
            <p><span style="font-size:20px;"><em><strong><span style="color:#330099;">{{$setting->company}}</span></strong></em></span></p>
            <p><span style="font-size:18px;">{{$setting->webname}}<br>
               Địa chỉ:{{$setting->address1}}</span>
            </p>
            <p><span style="font-size:18px;">Hotline:&nbsp;{{$setting->phone1}}</span></p>
            <p><span style="font-size:18px;">Email:&nbsp; <a href="mailto:{{$setting->email}}" target="_blank">{{$setting->email}}</a></span></p>
            <p><span style="font-size:18px;">Website:<a href="{{route('home')}}"> {{route('home')}}</span></p>
         </div>
         <div class="w-clear">
            <form class="form-contact" method="post" action="{{route('postcontact')}}" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="input-contact col-sm-6">
                     <input type="text" class="form-control" id="ten" name="name" placeholder="Họ tên" required="">
                  </div>
                  <div class="input-contact col-sm-6">
                     <input type="number" class="form-control" id="dienthoai" name="phone" placeholder="Số điện thoại" required="">
                  </div>
               </div>
               <div class="row">
                  <div class="input-contact col-sm-6">
                     <input type="text" class="form-control" id="diachi" name="address" placeholder="Địa chỉ" required="">
                  </div>
                  <div class="input-contact col-sm-6">
                     <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                  </div>
               </div>
               <div class="input-contact">
                  <textarea class="form-control" id="noidung" name="mess" placeholder="Nội dung" required=""></textarea>
               </div>
               <input type="submit" class="btn btn-primary" name="submit-contact" value="Gửi"></form>
         </div>
      </div>
   </div>
   {!!$setting->iframe_map!!}
</div>

@endsection