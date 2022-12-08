
   @php
         $img = json_decode($pro->images);
   @endphp
   <div class="box-product text-decoration-none w-clear">
      <a href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" title="{{languageName($pro->name)}}">
         <div class="pic-product scale-img images"><img src="{{$img[0]}}" alt="{{languageName($pro->name)}}" loading="lazy"></div>
      </a>
      <div class="w-clear info">
         <a href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" title="{{languageName($pro->name)}}">
            <h3 class="name-product text-split">{{languageName($pro->name)}}</h3>
         </a>
         <div class="price d-flex"><span class="price-new">{{$setting->phone1}}</span></div>
         <div class="text-center"><a class="button transition" href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}" title="{{languageName($pro->name)}}">Xem thêm</a></div>
      </div>
   </div>