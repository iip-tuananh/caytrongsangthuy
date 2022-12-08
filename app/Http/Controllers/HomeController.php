<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\BannerAds;
use App\models\website\Video;
use App\models\website\Founder;
use App\models\website\Prize;
use App\models\website\AlbumAffter;
use App\models\ReviewCus;
use App\models\PageContent;

class HomeController extends Controller
{
    public function home()
    {
        $data['bannerads'] = BannerAds::where('status',1)->get();
        $data['video'] = Video::where('status',1)->get();
        $data['hotnews'] = Blog::where([
            ['status','=',1]
        ])->orderBy('id','DESC')->limit(4)->get(['id','title','slug','created_at','image','description']);
        $data['spbanchay'] = Product::where(['status'=>1,'discountStatus'=>1])->limit(12)->get(['id','category','name','discount','price','images','slug','cate_slug','type_slug','description']);
        $data['aboutUs'] = PageContent::where(['type'=>'ve-chung-toi', 'language'=>'vi', 'status'=>1])->first(['id','title','content', 'description','image']);
        return view('home',$data);
    }
}
