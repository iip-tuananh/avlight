<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create(Request $request, Product $product)
    {
        $data = $product->createOrEdit($request);
        return response()->json(['data' => $data, 'message' => 'success'], 200);
    }
    public function list(Request $request)
    {
        $keyword = to_slug($request->keyword);
        $data = DB::table('products')
            ->leftJoin('product_category', function ($join) {
                $join->on('product_category.id', '=', 'products.category');
            })
            ->leftJoin('product_type', function ($join) {
                $join->on('product_type.id', '=', 'products.type_cate');
            })
            ->selectRaw("
                products.id,
                TRIM(BOTH '\"' FROM products.name) as name,
                products.images,
                product_category.name as cate,
                product_type.name as typeCate
            ")
            ->orderBy('products.id', 'DESC');
        if (!empty($keyword)) {
            $data = $data->where('products.slug', 'LIKE', '%' . $keyword . '%');
        }
        $data = $data->get();
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function edit($id)
    {
        $data = Product::where([
            'id' => $id
        ])
            ->first();
        return response()->json([
            'data' => $data,
            'message' => 'success'
        ]);
    }
    public function delete($id)
    {
        $query = Product::where(['id' => $id])
            ->first();
        if ($query->images) {
            $imgArr = json_decode($query->images);
            foreach ($imgArr as $i) {
                $file = str_replace('http://localhost:8080', '', $i);
                $filename = public_path() . $file;
                if (file_exists(public_path() . $file)) {
                    \File::delete($filename);
                }
            }
        }
        $query->delete();

        return response()->json([
            'message' => 'Delete success'
        ]);
    }
}
