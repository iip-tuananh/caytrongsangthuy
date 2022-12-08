@extends('layouts.main.master')
@section('title')
Giỏ hàng của bạn
@endsection
@section('description')
Giỏ hàng của bạn
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/cart.css')}}">
@endsection
@section('content')
<div class="main-content-wp" id="cart-page">
    <div id="breadcrumb-wp">
       <div class="inner-wp">
          <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
             <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemscope="" itemtype="https://schema.org/WebPage" itemprop="item" itemid="{{route('home')}}" title="Trang chủ" href="{{route('home')}}"><span itemprop="name">Trang chủ</span></a>&nbsp;/
                <meta itemprop="position" content="1">
             </li>
             <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <span itemprop="name">Giỏ hàng</span>
                <meta itemprop="position" content="2">
             </li>
          </ol>
       </div>
    </div>
    <div id="wrapper">
       <div class="inner-wp">
          <div id="main-content">
             <form action="" method="post" accept-charset="utf-8">
                <div class="section" id="info-cart-wp">
                   <div class="section-detail">
                      <table>
                         <thead>
                            <tr>
                               <td class="td-head td-center">Hình ảnh</td>
                               <td class="td-head td-left">Tên sản phẩm</td>
                               <td class="td-head td-center">Đơn giá</td>
                               <td class="td-head td-center">Số lượng</td>
                               <td colspan="2" class="td-head td-right">Thành tiền</td>
                            </tr>
                         </thead>
                         <tbody>
                            @php $total = 0; $qty = 0 ; @endphp
                            @foreach((array) session('cart') as $id => $details)
                                        @php 
                                        $total += ($details['price'] - ($details['price']*($details['discount']/100))) * $details['quantity'] ;
                                        $qty += $details['quantity'] ;
                                        @endphp
                            @endforeach
                            @foreach ($cart as $id => $details)
                            <tr>
                               <td class="td-body td-center">
                                  <div class="thumb-product">
                                     <img data-src="{{ url(''.$details['image']) }}" alt="{{ languageName($details['name']) }}" class=" ls-is-cached lazyloaded" src="{{ url(''.$details['image']) }}">
                                  </div>
                               </td>
                               <td class="td-body td-left"><a href="javascript:;" title="{{ languageName($details['name']) }}" target="_blank">{{ languageName($details['name']) }}</a></td>
                               <td class="td-body td-center"><span>{{ number_format($details['price'] - ($details['price']*($details['discount']/100))) }}₫</span></td>
                               <td class="td-body td-center">
                                  <input type="text" name="1[qty]" value="{{$details['quantity']}}" maxlength="3" class="num-order">
                               </td>
                               <td class="td-body td-right"><span>{{ number_format(($details['price'] - ($details['price']*($details['discount']/100)))*$details['quantity']) }}₫</span></td>
                               
                            </tr>
                            @endforeach
                         </tbody>
                         <tfoot>
                            <tr>
                               <td colspan="7" class="clearfix">
                                  <p class="total-price fl-right">Tổng giá: <span>{{number_format($total)}}₫</span></p>
                               </td>
                            </tr>
                            <tr>
                               <td colspan="7" class="clearfix">
                                  <div class="action fl-right">
                                     <a href="{{route('home')}}" title="Mua tiếp" class="buy-now">Mua tiếp</a>
                                     <a href="javascript:;" onclick="location.href='/thanh-toan.html'" title="Thanh toán" class="checkout-page">Thanh toán</a>
                                  </div>
                               </td>
                            </tr>
                         </tfoot>
                      </table>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection