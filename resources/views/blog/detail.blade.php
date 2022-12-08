@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')

<div class="wrap-main w-clear">
   <div class="title-main">
      <div class="name">{{languageName($blog_detail->title)}}</div>
   </div>
   <div class="time-main"><i class="fas fa-calendar-week"></i><span>Ngày đăng: {{date_format($blog_detail->created_at,'d/m/Y')}}</span></div>
   <div class="meta-toc">
      <div class="box-readmore">
         <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
      </div>
   </div>
   <div class="content-main w-clear" id="toc-content">
      {!!languageName($blog_detail->content)!!}
   </div>
   <div class="share">
      <b>Chia sẻ:</b>
      <div class="social-plugin w-clear">
         <div class="addthis_inline_share_toolbox_qj48" data-url="{{url()->current()}}" data-title="{{languageName($blog_detail->title)}}">
            <div id="atstbx3" class="at-share-tbx-element at-share-tbx-native addthis_default_style addthis_20x20_style addthis-smartlayers addthis-animated at4-show">
               <a class="addthis_button_facebook_share at_native_button at300b" fb:share:layout="button_count">
                  <div class="fb-share-button fb_iframe_widget" data-layout="button_count" data-href="{{url()->current()}}" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href={{url()->current()}}&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey"><span style="vertical-align: bottom; width: 86px; height: 20px;"><iframe name="fe3432eba67bc8" width="1000px" height="1000px" data-testid="fb:share_button Facebook Social Plugin" title="fb:share_button Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/share_button.php?app_id=&amp;channel={{url()->current()}}&amp;container_width=0&amp;href={{url()->current()}}&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey" style="border: none; visibility: visible; width: 86px; height: 20px;" class=""></iframe></span></div>
               </a>
               <a class="addthis_button_facebook_like at_native_button at300b" fb:like:layout="button_count">
                  <div class="fb-like fb_iframe_widget" data-layout="button_count" data-show_faces="false" data-share="false" data-action="like" data-width="90" data-height="25" data-font="arial" data-href="{{url()->current()}}" data-send="false" style="height: 25px;" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;font=arial&amp;height=25&amp;href={{url()->current()}}&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 90px; height: 28px;"><iframe name="f3c843f474c4a4c" width="90px" height="25px" data-testid="fb:like Facebook Social Plugin" title="fb:like Facebook Social Plugin" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" src="https://www.facebook.com/v2.6/plugins/like.php?action=like&amp;app_id=&amp;channel={{url()->current()}}&amp;container_width=0&amp;font=arial&amp;height=25&amp;href={{url()->current()}}&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;send=false&amp;share=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 90px; height: 28px;" class=""></iframe></span></div>
               </a>
               {{-- <a class="addthis_counter addthis_pill_style at_native_button" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact">Chia sẻ<span></span></a><a class="addthis_button_expanded" target="_blank" title="Thêm..." href="#" tabindex="1000"></a></a> --}}
               <div class="atclear"></div>
            </div>
         </div>
         <div class="zalo-share-button" data-href="{{url()->current()}}" data-oaid="579745863508352884" data-layout="1" data-color="blue" data-customize="false" style="position: relative; display: inline-block; width: 70px; height: 20px;"><iframe id="1f91166f-e8c1-438c-a4fa-98fb39639f46" name="1f91166f-e8c1-438c-a4fa-98fb39639f46" frameborder="0" allowfullscreen="" scrolling="no" width="70px" height="20px" src="https://button-share.zalo.me/share_inline?id=1f91166f-e8c1-438c-a4fa-98fb39639f46&amp;layout=1&amp;color=blue&amp;customize=false&amp;width=70&amp;height=20&amp;isDesktop=true&amp;url={{url()->current()}}&amp;d=eyJ1cmwiOiJodHRwczovL3R1YmVwbmhhdmlldC52bi9naWEtdHUtYmVwLW5odWEifQ%253D%253D&amp;shareType=0" style="position: absolute; z-index: 99; top: 0px; left: 0px;"></iframe></div>
      </div>
   </div>
   <div class="share othernews">
      <b>Bài viết khác:</b>
      <ul class="list-news-other">
         @foreach ($bloglq as $item)
         <li><a class="text-decoration-none" href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">{{languageName($item->title)}}</a>
         </li>
         @endforeach
      </ul>
      <div class="pagination-home"></div>
   </div>
</div>

@endsection