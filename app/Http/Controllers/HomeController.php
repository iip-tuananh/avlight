<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\product\Category;
use App\models\product\Product;
use App\models\blog\Blog;
use Session;
use App\models\website\Partner;
use App\models\blog\BlogCategory;
use App\models\ReviewCus;
use App\models\PageContent;
use App\models\Project;
use App\models\BannerAds;
use  App\models\website\Founder;
use App\models\website\AlbumAffter;

class HomeController extends Controller
{
    public function home()
    {
        $data['hotnews'] = Blog::where(['category'=>'tin-tuc'])->get();
        $data['sanphamnoibat'] = Product::where(['status' => 1])
        ->with(['cate', 'typecate']) // Eager load các mối quan hệ
        ->orderBy('id', 'desc')
        ->take(15) 
        ->get();
        
        $data['bannerads'] = BannerAds::where(['status'=>1])->get();
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image']);
        $data['partner'] = Partner::where(['status'=>1])->get();
        $data['logokhachhang'] = AlbumAffter::where(['status'=>1])->get();
        $data['giaiphap'] = Blog::where(['category'=>'giai-phap'])->get();
        // dd($data['sanphamnoibat']);
        $data['project'] = Project::where(['status'=>1])->get();
        $data['reviewcus'] = ReviewCus::where(['status'=>1])->get();
        $data['founder'] = Founder::where(['status'=>1])->get();
        return view('home',$data);
    }
}
