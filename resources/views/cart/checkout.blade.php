@extends('layouts.main.master')
@section('title')
Đặt bàn tại Lynh
@endsection
@section('description')
Bún đậu mắm tôm Lynh
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('frontend/css/checkout.css')}}">
@endsection
@section('content')
<div class="main-content-wp" id="checkout-page">
    <div id="breadcrumb-wp">
       <div class="inner-wp">
          <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
             <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemscope="" itemtype="https://schema.org/WebPage" itemprop="item" itemid="{{route('home')}}" title="Trang chủ" href="{{route('home')}}"><span itemprop="name">Trang chủ</span></a>&nbsp;/
                <meta itemprop="position" content="1">
             </li>
             <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <span itemprop="name">Thanh toán</span>
                <meta itemprop="position" content="2">
             </li>
          </ol>
       </div>
    </div>
    <div id="wrapper" style="min-height: 470px;">
       <div class="inner-wp">
          <div id="main-content">
             <form method="post" action="{{route('postBill')}}" accept-charset="utf-8">
                @csrf
                <div class="block-list clearfix">
                   <div class="block-item">
                      <h2 class="block-title">Thông tin khách hàng</h2>
                      <div class="block-detail">
                         <div class="field-wrap">
                            <div class="field-item">
                               <label>Họ và tên <span>*</span></label>
                               <input type="text" name="billingName" id="fullname" required="required">
                            </div>
                            <div class="field-item">
                               <label>Điện thoại <span>*</span></label>
                               <input type="text" name="billingPhone" id="tel" required="required">
                            </div>
                            <div class="field-item">
                               <label>Địa chỉ <span>*</span></label>
                               <input type="text" name="billingAddress" id="address" required="required">
                            </div>
                            <div class="field-item">
                               <label>Ghi chú</label>
                               <textarea name="note" id="note"></textarea>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="block-item">
                      <h2 class="block-title">Đơn hàng</h2>
                      <div class="block-detail">
                         <table>
                            <thead>
                               <tr>
                                  <td colspan="2" class="td-head td-left">Sản phẩm <span>(1)</span></td>
                                  <td width="200" class="td-head td-right">Tạm tính</td>
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
                                  <td width="50" class="td-body td-left">
                                     <div class="thumb">
                                        <img data-src="{{ url(''.$details['image']) }}" alt="{{ languageName($details['name']) }}" class=" ls-is-cached lazyloaded" src="{{ url(''.$details['image']) }}">
                                     </div>
                                     <span class="num-order">{{$details['quantity']}}</span>
                                  </td>
                                  <td width="1000" class="td-body td-left">{{ languageName($details['name']) }}</td>
                                  <td class="td-body td-right"><span>{{ number_format(($details['price'] - ($details['price']*($details['discount']/100)))*$details['quantity']) }}₫</span></td>
                               </tr>
                               @endforeach
                               <tr>
                                  <td colspan="2" class="td-body td-left">Tạm tính</td>
                                  <td class="td-body td-right"><span>{{number_format($total)}}</span></td>
                               </tr>
                               <tr>
                                  <td colspan="2" class="td-body td-left">Giao hàng</td>
                                  <td class="td-body td-right">Phí ship (Phí giao hàng): 30.000đ</td>
                               </tr>
                            </tbody>
                            <tfoot>
                               <tr>
                                  <td colspan="2" class="td-foot td-left">Tổng đơn hàng:</td>
                                  <td class="td-foot td-right"><span>{{number_format($total+30000)}}đ</span></td>
                               </tr>
                            </tfoot>
                         </table>
                         <div class="payment-wp">
                            <div class="widget-list">
                               <div class="widget-item">
                                  <input type="radio" name="payment" value="banking" checked="checked" id="banking">
                                  <label for="banking">Chuyển khoản ngân hàng</label>                                        
                                  <div class="widget-title">Quý khách vui lòng thanh toán qua tài khoản:</div>
                                  <div class="widget-detail">
                                     <ul class="list-item">
                                        <li>Chủ tài khoản: <strong></strong></li>
                                        <li>Số tài khoản: <strong></strong></li>
                                        <li>Ngân hàng: <strong></strong></li>
                                     </ul>
                                     <p>Nội dung thanh toán: <strong>Họ Tên + SĐT</strong></p>
                                  </div>
                               </div>
                               <div class="widget-item">
                                  <input type="radio" name="payment" value="cod" id="cod">
                                  <label for="cod">Thanh toán tiền mặt khi nhận hàng</label>                                    
                               </div>
                            </div>
                         </div>
                         <div class="policy-wp">
                            <input type="checkbox" name="policy" value="accept" checked="checked" id="policy">
                            <label for="policy">Tôi đã đọc và đồng ý với điều khoản và điều kiện của website *</label>
                         </div>
                         <div class="action-wp clearfix">
                            <input type="submit" name="checkout" value="Đặt Hàng" class="button-check fl-right">
                            <a href="{{route('listCart')}}" title="" class="button-return fl-left">Quay về giỏ hàng</a>
                         </div>
                         <div class="rules-wp">
                            <p>Thông tin cá nhân của bạn sẽ được sử dụng để xử lý đơn hàng. Giúp chúng tôi đưa ra những định hướng để tăng trải nghiệm website và cho những mục đích cụ thể khác đã được mô tả trong chính sách riêng tư.</p>
                         </div>
                      </div>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>

@endsection