@extends('layouts.main.master')
@section('title')
{{$pagecontentdetail->title}}
@endsection
@section('description')
{{$pagecontentdetail->title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">{{$pagecontentdetail->title}}</div>
   </div>
   <div class="content-main w-clear">
      {!!$pagecontentdetail->content!!}
   </div>
</div>
@endsection