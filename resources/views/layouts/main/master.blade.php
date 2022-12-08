<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <title>@yield('title')</title>
      <meta name="description" content="">
      <meta name="keywords" content="@yield('title')"/>
      <meta name="robots" content="noodp,index,follow" />
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="description" content="@yield('description')" />
      <link rel="canonical" href="{{url()->current()}}" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="@yield('title')" />
      <meta property="og:description" content="@yield('description')" />
      <meta property="og:url" content="{{url()->current()}}" />
      <meta property="og:site_name" content="thaonguyenxanh.info" />
      <meta property="og:updated_time" content="2021-08-28T22:06:30+07:00" />
      <meta property="og:image" content="@yield('image')" />
      <meta property="og:image:secure_url" content="@yield('image')" />
      <meta property="og:image:width" content="598" />
      <meta property="og:image:height" content="333" />
      <meta property="og:image:alt" content="" />
      <meta property="og:image:type" content="image/jpeg" />
      <meta name="twitter:card" content="summary_large_image" />
      <meta name="twitter:title" content="@yield('title')" />
      <meta name="twitter:description" content="@yield('description')" />
      <meta name="twitter:image" content="@yield('image')" />
      <meta name="google-site-verification" content="dKF5ynJ5SQgD62YPzBfNC8W7q3wzLANMxpoawuJF63I" />
      <!-- Fav Icon -->
      <link rel="icon" href="{{url(''.$setting->favicon)}}" type="image/x-icon">
      <!-- Css Files -->
      <link href="{{asset('frontend/css/fonts.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/animate.min.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/all.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/mmenu.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/jquery.fancybox.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/jquery.fancybox.style.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/login.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/cart.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/photobox.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/slick.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/slick-theme.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/slick-style.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/jquery.simplyscroll.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/jquery.simplyscroll-style.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/fotorama.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/fotorama-style.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/magiczoomplus.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/jquery.datetimepicker.css')}}" rel="stylesheet">
      <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
      @yield('css')
      <!-- Background -->
      
   </head>
   <body>
      @include('layouts.header.index')
      @yield('content')
      @include('layouts.footer.index')
      <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/{{$setting->phone1}}">
         <div class="animated infinite zoomIn kenit-alo-circle"></div>
         <div class="animated infinite pulse kenit-alo-circle-fill"></div>
         <i><img src="{{asset('frontend/images/zl.png')}}" alt="Zalo"></i>
      </a>
      <a class="btn-phone btn-frame text-decoration-none" href="tel:{{$setting->phone1}}">
         <div class="animated infinite zoomIn kenit-alo-circle"></div>
         <div class="animated infinite pulse kenit-alo-circle-fill"></div>
         <i><img src="{{asset('frontend/images/hl.png')}}" alt="Hotline"></i>
      </a>
      <!-- Modal notify -->
      <div class="modal modal-custom fade" id="popup-notify" tabindex="-1" role="dialog" aria-labelledby="popup-notify-label" aria-hidden="true">
         <div class="modal-dialog modal-dialog-top modal-md" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="popup-notify-label">Thông báo</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal cart -->
      <div class="modal fade" id="popup-cart" tabindex="-1" role="dialog" aria-labelledby="popup-cart-label" aria-hidden="true">
         <div class="modal-dialog modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h6 class="modal-title" id="popup-cart-label">Giỏ hàng của bạn</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body"></div>
            </div>
         </div>
      </div>
      <!-- Js Config -->
      <script type="text/javascript">
         var NN_FRAMEWORK = NN_FRAMEWORK || {};
         var CONFIG_BASE = '';
         var WEBSITE_NAME = '';
         var TIMENOW = '';
         var SHIP_CART = false;
         var GOTOP = '{{url('frontend/images/top.png')}}';
         var LANG = {};
      </script>
      <!-- Js Files -->
      <script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/bootstrap.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/wow.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/mmenu.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/jquery.simplyscroll.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/fotorama.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/magiczoomplus.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/slick.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/jquery.fancybox.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/photobox.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/php-date-formatter.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/jquery.mousewheel.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/jquery.datetimepicker.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/toc.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/functions.js')}}"></script>
      <script type="text/javascript" src="{{asset('frontend/js/apps.js')}}"></script>
      @yield('js')
      <div id="script-main" class="w-clear"></div>
      <!-- Js Body -->
   </body>
</html>