<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use Session;
use App\models\product\Category;
use App\models\product\TypeProduct;
use DB,stdClass,File;
use App\models\District;
use Goutte\Client;
use App\models\blog\Blog;
use App\models\MessContact;
use App\models\Services;
use App\models\ServiceCate;
use App\models\website\Prize;
use App\models\website\Founder;
use App\models\website\Partner;
use App\models\ReviewCus;
use App\models\PageContent;
use App\models\Project;
class PageController extends Controller
{
    public function orderNow()
    {
        return view('orderNow');
    }
    public function baogia()
    {
        return view('baogia');
    }
    public function menu()
    {

        $data['allproduct'] = Product::where([
            ['status', '=', 1]
        ])->limit(9)->orderBy('id','DESC')->get(['id','name','discount','price','images','slug']);
        $data['hotnews'] = Blog::where([
            ['status','=',1],
            ['type_news','=','tin-hot']
        ])->orderBy('id','DESC')->limit(7)->get(['id','title','slug','created_at','image']);
        return view('menu',$data);
    }
    public function quickview($id){
        $data['product'] = Product::with('cate')->where('id',$id)->first();
        return view('layouts.product.quickview',$data);
    }
    public function aboutUs(){
        $data['partner'] = Partner::where(['status'=>1])->get();
        $data['reviewcus'] = ReviewCus::where(['status'=>1])->get();
        $data['founder'] = Founder::where(['status'=>1])->get();
        $data['gioithieu'] = PageContent::where(['slug'=>'gioi-thieu','language'=>'vi'])->first(['id','title','content','image']);

        return view('aboutus',$data);
    }
    public function contact()
    {
        return view('contactus');
    }
    public function getPostInfor()
    {
        $data['category_product'] = Category::where('status',1)->get();
        return view('post_info.index',$data);
    }
    public function postPostInfor(Request $request,Product $product )
    {
        $data = $product->createClient($request);
        $data['category'] = Category::where(['status'=> 1])->orderBy('id','ASC')->get();
        $data['categoryFirst'] = Category::where(['status'=> 1])->orderBy('id','ASC')->first();
        $productNewFirstTab = Product::where([
            'category'=> $data['categoryFirst'] ? $data['categoryFirst']->id : 0,
            'status' => 0
        ])->with('customer')
        ->orderBy('id','ASC')
        ->limit(10)->get()->toArray();
        $data['productNewFirstTab'] = array_chunk($productNewFirstTab,2);
        return view('home',$data)->with('success','Tin của bạn đang được xét duyệt!');
    }
    public function typeproduct($id)
    {
        $arr = [];
        $data = TypeProduct::where('cate_id',$id)->get();
        $lang = Session::get('locale');
        foreach($data as $item){
            $obj = new stdClass();
            $obj->name = languageName($item->name);
            $obj->id = $item->id;
            $arr[] = $obj;
        }
        return response()->json([
    		'message' => 'get data Success',
    		'data'=> $arr
    	],200);
    }
    public function district($id)
    {
        $data = District::where('_province_id',$id)->get();
        return response()->json([
    		'message' => 'get data Success',
    		'data'=> $data
    	],200);
    }


    public function search(Request $request)
    {
        $keyword = $request->input('keyword', '');

        $query = Product::with([
            'typecate', 'cate',
        ])
            ->where('status', 1)
            ->when($keyword, function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%");
            })
            ->select('id','name','price','discount','images','slug','category','type_cate','category');

        $products = $query
            ->paginate(20)
            ->appends(['keyword' => $keyword]);

        return view('search_result', [
            'products' => $products,
            'keyword'  => $keyword,
        ]);
    }

public function ajaxSearch(Request $request)
{
    $keyword = $request->keyword;
    // $tukhoa = languageName($keyword);
    // dd($keyword);
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->take(5)
            ->get();

        $total = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->where('status', 1)
            ->count();
       $html = view('ajax_search_result', compact('products'))->render();
        return response()->json(['html' => $html]);
}
    public function postcontact(Request $request){
        $data = new MessContact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->mess = $request->message;
        $data->save();
        if($data){
            return response()->json([
                'status'  => 'success',
                'message' => 'Gửi tin thành công'
            ]);
        }else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Gửi tin thất bại'
            ], 500);
        }
    }

    public function serviceCateList($slug)
    {
        $data['listService'] = Services::where(['cate_slug'=>$slug])->orderBy('id','DESC')->paginate(15);
        $data['cate'] = ServiceCate::where(['slug'=>$slug])->first();
        return view('servicelist',$data);
    }
    public function serviceDetail($slug)
    {
        $data['detail_service'] = Services::where(['slug'=>$slug])->first();

        return view('servicedetail',$data);
    }
    public function serviceList()
    {
        $data['list'] = Services::where('status',1)->paginate(9);

        return view('servicelist',$data);
    }
    public function duanTieuBieu()
    {
        $data['duan'] = Project::where('status',1)->paginate(12);
        $data['album'] = Prize::where(['status'=>1])->get(['id','image','name','link']);
        return view('album',$data);
    }
    public function duanTieuBieuDetail($slug)
{
    // Lấy thông tin chi tiết dự án
    $data['detail'] = Project::where('slug', $slug)->first();

    // Lấy danh sách dự án liên quan, ngoại trừ dự án chi tiết
    $data['prolq'] = Project::where('id', '!=', $data['detail']->id)
                            ->where('status', 1) // Điều kiện khác nếu cần
                            ->limit(5) // Giới hạn số lượng dự án liên quan
                            ->get();

    return view('detailProject', $data);
}
    public function fag()
    {
        return view('faq');
    }
}
