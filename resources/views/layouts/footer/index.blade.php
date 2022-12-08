<div class="footer">
   <div class="footer-article">
      <div class="wrap-content d-flex align-items-start justify-content-between">
         <div class="footer-news ft-1">
            <h2 class="title-footer">{{$setting->company}}</h2>
            <div class="info-footer">
               <p>{{$setting->webname}}</p>
               <p>VPGD: {{$setting->address1}}</p>
               <p>Địa chỉ: {{$setting->address2}}</p>
               <p>Hotline: <span style="color:#f1c40f;">{{$setting->phone1}}</span></p>
               <p>Email: <a href="mailto:{{$setting->email}}" target="_blank">{{$setting->email}}</a></p>
               <p>Website: <a href="{{route('home')}}">{{route('home')}}</a></p>
            </div>
            <div class="social">
               <a href="" target="_blank">
               <img src="{{url('frontend/images/40-twi-w-46250.png')}}" alt="Twi" title="Twi" loading="lazy" />
               </a>
               <a href="" target="_blank">
               <img src="{{url('frontend/images/40-pin-w-58871.png')}}" alt="Pin" title="Pin" loading="lazy"/>
               </a>
               <a href="" target="_blank">
               <img src="{{url('frontend/images/40-ins-w-35870.png')}}" alt="Ins" title="Ins" loading="lazy"/>
               </a>
               <a href="" target="_blank">
               <img src="{{url('frontend/images/40-gg-w-86121.png')}}" alt="gg" title="gg" loading="lazy"/>
               </a>
               <a href="" target="_blank">
               <img src="{{url('frontend/images/40-fb-w-56690.png')}}" alt="Fb" title="Fb" loading="lazy"/>
               </a>
            </div>
         </div>
         <div class="footer-news ft-2">
            <div class="label-tags">Chính sách</div>
            <div class="info-footer">
               <ul class="footer-ul">
                  @foreach ($pageContent as $item)
                     @if ($item->type == 'ho-tro-khanh-hang')
                     <li><a class="text-decoration-none" href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a></li>
                     @endif
                  @endforeach
               </ul>
               <div class="label-tags">Đăng ký nhận tin</div>
               <div class="w-celar">
                  <form class="form-newsletter validation-newsletter" novalidate method="post" action="{{route('postcontact')}}" enctype="multipart/form-data">
                     @csrf
                     <div class="dknt d-flex">
                        <div class="newsletter-input">
                           <input type="email" class="form-control" id="email-newsletter" name="email" placeholder="Email" required />
                           <div class="invalid-feedback">Vui lòng nhập địa chỉ email</div>
                        </div>
                        <div class="newsletter-button">
                           <input type="submit" name="submit-newsletter" class="button" value="Gửi" disabled>
                           <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="footer-news ft-3">
            <div class="label-tags">Vị trí</div>
            <div class="info-footer fanpage">
               {!!$setting->iframe_map!!}
            </div>
         </div>
      </div>
   </div>
   <div class="footer-powered">
      <div class="wrap-content d-flex align-items-start justify-content-between">
         <p class="copyright">&copy 2022 <span>Cây Trồng Sáng Thủy</span>. Designed by <a href="https://sbtsoftware.vn/" target="_blank">SBT</a></p>
      </div>
   </div>
</div>