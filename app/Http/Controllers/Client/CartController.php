<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product\Product;
use Cart, Auth, Redirect, DB;
use App\models\Bill\BillDetail;
use App\models\Bill\Bill;
use Mail;
use App\Mail\DemoMail;

class CartController extends Controller
{
    public function checkout()
    {
        $data['cart'] = session()->get('cart', []);
        $data['profile'] = Auth::guard('customer')->user();
        return view('cart.checkout', $data);
    }
    public function postBill(Request $request)
    {
        $profile = Auth::guard('customer')->user();
        $cart = session()->get('cart', []);
        $code_bill = rand();
        DB::beginTransaction();
        try {
            $query = new Bill();
            $query->code_bill = $code_bill;
            $query->code_customer = $profile ? $profile->id : 0;
            $query->total_money = $request->total_money;
            $query->statu = 0;
            $query->note = $request->note;
            $query->cus_name = $request->billingName;
            $query->cus_phone = $request->billingPhone;
            $query->cus_email = $request->billingEmail;
            $query->cus_address = $request->billingAddress;
            $query->transport_price = $request->shippingMethod ? $request->shippingMethod : 0;
            $query->save();
            foreach ($cart as $key => $item) {
                $billdetail = new BillDetail();
                $billdetail->code_bill = $code_bill;
                $billdetail->code_product = $item['id'];
                $billdetail->name = $item['name'];

                    if ($item['discount'] > 0) {
                        $billdetail->price = $item['discount'];
                    } else {
                        $billdetail->price = $item['price'];
                    }

                $billdetail->qty = $item['quantity'];
                $billdetail->images = $item['image'];
                // $billdetail->variant = $item['status_variant'] == 1 ? $item['variant'] : '';
                $billdetail->save();
                // $product = Product::find($item['id']);
                // if ($product->qty > $billdetail->qty) {
                //     $product->qty = $product->qty - $billdetail->qty;
                //     $product->save();
                // } else {
                //     $product->qty = 0;
                //     $product->save();
                // }
            }
            DB::commit();
            // $data = ['cus' => $query, 'bill' => $cart];
            // Mail::to('muadogo.vn@gmail.com')->send(new DemoMail($data));
            // $request->session()->forget('cart');
            return view('cart.orderSuccess')->with('cart', $cart)->with('code_bill', $code_bill)->with('profile', $profile);
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
            return back()->with('error', 'Gửi đơn hàng thất bại');
        }
    }

public function listCart()
{
    $data['cart'] = session()->get('cart', []); // Lấy giỏ hàng từ session
    $totalPrice = 0;

    // Tính tổng tiền
    foreach ($data['cart'] as $item) {
        $price = $item['discount'] > 0 ? $item['discount'] : $item['price'];
        $totalPrice += $price * $item['quantity'];
    }

    $data['totalPrice'] = $totalPrice; // Truyền tổng tiền sang View

    return view('cart.list', $data);
}

    // add to cart

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');

        $quantity = $request->input('quantity', 1);
        // dd($request->all());
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "id" => $productId,
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "discount" => $product->discount,
                "image" => json_decode($product->images)[0],
            ];
        }

        session()->put('cart', $cart);

        $totalPrice = 0;
        $cartCount = 0;
        foreach ($cart as $item) {
            $price = $item['discount'] > 0 ? $item['discount'] : $item['price'];
            $totalPrice += $price * $item['quantity'];
            $cartCount += $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'totalPrice' => number_format($totalPrice, 0, ',', '.') . '₫',
            'cartCount' => $cartCount
        ]);
    }
    // cần lưu lại


    // update
    public function update(Request $request)
    {
        // Kiểm tra xem product_id và quantity có được gửi không
        if ($request->has('product_id') && $request->has('quantity')) {
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');
            // Lấy giỏ hàng từ session
            $cart = session()->get('cart', []);
            // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
            if (isset($cart[$productId])) {
                // Cập nhật số lượng sản phẩm
                $cart[$productId]['quantity'] = $quantity;
                // Lưu lại giỏ hàng vào session
                session()->put('cart', $cart);
                // Tính tổng tiền
                $totalPrice = 0;
                foreach ($cart as $item) {
                    $price = $item['discount'] > 0 ? $item['discount'] : $item['price'];
                    $totalPrice += $price * $item['quantity'];
                }
                    $cartCount = array_sum(array_column($cart, 'quantity'));
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            $price = $item['discount'] > 0 ? $item['discount'] : $item['price'];
            return $carry + ($price * $item['quantity']);
        }, 0);
                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật số lượng thành công.',
                    'cartCount' => $cartCount,
                    'cart' => $cart,
                    'totalPrice' => number_format($totalPrice, 0, ',', '.') . '₫'
                ]);
            }
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ.'
        ]);
    }

    // delete

public function remove(Request $request)
{
    $productId = $request->input('product_id');

    // Lấy giỏ hàng từ session
    $cart = session()->get('cart', []);

    // Kiểm tra xem sản phẩm có tồn tại trong giỏ hàng không
    if (isset($cart[$productId])) {
        unset($cart[$productId]); // Xóa sản phẩm khỏi giỏ hàng

        // Lưu lại giỏ hàng vào session
        session()->put('cart', $cart);

        // Tính lại tổng tiền
        $totalPrice = 0;
        $cartCount = 0;
        $cartHtml = '';
        foreach ($cart as $item) {
            $price = $item['discount'] > 0 ? $item['discount'] : $item['price'];
            $totalPrice += $price * $item['quantity'];
            $cartCount += $item['quantity'];

            // Render đến trang ajax của từng sản phẩm
            $cartHtml .= view('cart.cart-ajax', compact('item'))->render();
        }
        // trả các dữ liệu về dạng json với trạng thái thành coonng susscess:true
        return response()->json([
            'message' => 'Xóa sản phẩm thành công.',
            'success' => true,
            'cartHtml' => $cartHtml,
            'totalPrice' => number_format($totalPrice, 0, ',', '.') . '₫',
            'cartCount' => $cartCount,
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'
    ]);
}
    public function orderSuccess()
    {
        return view('cart.orderSuccess');
    }

public function getCartCount()
{
    $cart = session()->get('cart', []);
    $cartCount = array_sum(array_column($cart, 'quantity'));

    return response()->json([
        'cartCount' => $cartCount,
    ]);
}
}
