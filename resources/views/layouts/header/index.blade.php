<div class="header">
   <div class="header-top">
      <div class="wrap-content d-flex align-items-center justify-content-between">
         <div class="w-clear">
            <span class="info-header ">
               <marquee behavior="" direction="">{{$setting->company}}</marquee>
            </span>
         </div>
         <div class="social social-header"> <span>Chia sẻ MXH: </span>
            <a href="" target="_blank">
            <img src="{{url('frontend/images/25-yt-85181.png')}}" alt="Yt" title="Yt"/>
            </a>
            <a href="" target="_blank">
            <img src="{{url('frontend/images/25-gg-99151.png')}}" alt="gg" title="gg"/>
            </a>
            <a href="{{$setting->facebook}}" target="_blank">
            <img src="{{url('frontend/images/25-fb-30530.png')}}" alt="Fb" title="Fb"/>
            </a>
         </div>
         {{-- <div class="w-clear  social menu-header-top ">
            <a href="{{url('frontend/CTL-DG.pdf')}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> Catalogue</a> | 
            <a href="{{route('pagecontent',['slug'=>'gioi-thieu'])}}">Giới thiệu</a> | 
            <a href="{{route('allListBlog')}}">Tin tức</a> | 
            <a href="{{route('lienHe')}}">Liên hệ</a> 
         </div> --}}
      </div>
   </div>
</div>
<div class="header-bottom">
   <div class="w_1200 d-flex">
      <div class="header-l d-flex  align-items-center">
         <a class="logo-header" href="{{route('home')}}"><img class="transition " src="{{$setting->logo}}"/></a>
      </div>
      <div class="search-header">
         <div class="search w-clear ">
            <form action="{{route('search_result')}}" method="post">
               @csrf
               <input type="text" name="keyword" placeholder="Nhập từ khóa cần tìm..." required/>
            <button type="submit"><i class="fas fa-search"></i></button>
            </form>
            
         </div>
      </div>
      <div class="header-r d-flex  align-items-center justify-content-between ">
         <div class="hotline-header">
            <span class="name">Hotline: </span>
            <span class="hotline">{{$setting->phone1}}</span>
         </div>
      </div>
   </div>
</div>
<div class="box_scroll scroll_menu">
   <div class="menu-header">
      <div class="w-clear pos-relative w_1200">
         <div class="menu">
            <ul class="d-flex align-items-center justify-content-between ">
               <li class="menu-line ">
                  <a class="transition active home" href="javascript:void(0);" title="Danh mục sản phẩm">Danh mục sản phẩm <i class="fa fa-bars mr-1"></i></a>
                  <ul>
                     @foreach ($categoryhome as $cate)
                     <li>
                        <a class="transition" title="{{languageName($cate->name)}}" href="{{route('allListProCate', ['danhmuc'=>$cate->slug])}}">{{languageName($cate->name)}}
                           @if (count($cate->typeCate) > 0)
                           <img src="{{url('frontend/images/next.png')}}" alt="" style="width: 18px; float:right; margin-top: 3px;">
                           @endif
                        </a>
                        @if (count($cate->typeCate) > 0)
                        <ul>
                           @foreach ($cate->typeCate as $type)
                           <li>
                              <a class="transition" title="{{languageName($type->name)}}" href="{{route('allListType',['danhmuc'=>$type->cate_slug, 'loaidanhmuc'=>$type->slug])}}">{{languageName($type->name)}}</a>
                           </li>
                           @endforeach
                        </ul>
                        @endif
                     </li>
                     @endforeach
                  </ul>
               </li>
               <li class="menu-line ">
                  <a class="transition " title="Trang chủ" href="{{route('home')}}">Trang chủ</a>
               </li>
               <li class="menu-line ">
                  <a class="transition " title="Giới thiệu" href="{{route('aboutUs')}}">Giới thiệu</a>
               </li>
               <li class="menu-line ">
                  <a class="transition " title="Dịch vụ" href="{{route('serviceList')}}">Dịch vụ</a>
                  <ul>
                     @foreach ($servicehome as $item)
                     <li>
                        <a class="transition" title="{{$item->name}}" href="{{route('serviceDetail',['slug'=>$item->slug])}}">{{$item->name}}</a>
                     </li>
                     @endforeach
                  </ul>
               </li>
               @foreach ($blogCateDesign as $cate)
               <li class="menu-line ">
                  <a class="transition " title="{{languageName($cate->name)}}" href="{{route('listCateBlog', ['slug'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
               </li>
               @endforeach
               @foreach ($blogCate as $cate)
               <li class="menu-line ">
                  <a class="transition " title="{{languageName($cate->name)}}" href="{{route('listCateBlog', ['slug'=>$cate->slug])}}">{{languageName($cate->name)}}</a>
               </li>
               @endforeach
               <li class="menu-line ">
                  <a class="transition " title="Liên hệ" href="{{route('lienHe')}}">Liên hệ</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="menu-res">
      <div class="menu-bar-res ">
         <a id="hamburger" href="#menu" title="Menu"><span></span></a>
         <div class="search-res">
            <p class="icon-search transition"><i class="far fa-search"></i></p>
            <div class="search-grid w-clear">
               <form action="{{route('search_result')}}" method="post">
                  @csrf
                  <input type="text" name="keyword" id="keyword2" placeholder="Nhập từ khóa cần tìm..." required/>
                  <button type="submit"><i class="far fa-search"></i></button>
               </form>
               
            </div>
         </div>
      </div>
      <nav id="menu">
         <ul>
            <li class="menu-line ">
               <a class="transition " href="" title="Sản phẩm">Sản phẩm</a>
               <ul>
                  @foreach ($categoryhome as $item)
                  <li>
                     <a class="transition" title="{{languageName($item->name)}}" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}">{{languageName($item->name)}}</a>
                     @if (count($item->typeCate) > 0)
                     <ul>
                        @foreach ($item->typeCate as $type)
                        <li>
                           <a class="transition" title="{{languageName($type->name)}}" href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}">{{languageName($type->name)}}</a>
                        </li>
                        @endforeach
                     </ul>
                     @endif
                  </li>
                  @endforeach
               </ul>
            </li>
            <li><a class="transition active" href="{{route('home')}}" title="Trang chủ">Trang chủ</a></li>
            <li class="menu-line "><a class="transition " href="{{route('lienHe')}}" title="Liên hệ">Liên hệ</a></li>
            <li class="menu-line "><a class="transition " href="{{route('aboutUs')}}" title="Giới thiệu">Giới thiệu</a></li>
            <li class="menu-line "><a class="transition " href="{{route('serviceList')}}" title="Dịch vụ">Dịch vụ</a></li>
            @foreach ($blogCate as $cate)
            <li class="menu-line ">
               <a class="transition " href="{{route('listCateBlog', ['slug'=>$cate->slug])}}" title="{{languageName($cate->name)}}">{{languageName($cate->name)}}</a>
            </li>
            @endforeach
         </ul>
      </nav>
   </div>
</div>