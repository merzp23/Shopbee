<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\CartHas;
use App\Models\Cart;
use App\Models\Customer;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $cartId = 1; // Tạm thời lấy cart đầu tiên, khi nào sửa xong phần giỏ hàng thì lấy id của cart tryền vào để lấy ra cart này <3.
        $customer = Cart::where('CART_ID', $cartId)->first()->customer;
        $cartHas = CartHas::where('CART_ID', $cartId)->get();
        
        return response()->view('payment.index', [
            'cartHas' => $cartHas,
            'customer' => $customer,
            'cartId' => $cartId,
        ]);
    }

    public function submit(Request $request)
    {
        $cartId = $request->cart_id;
        $customer = Cart::where('CART_ID', $cartId)->first()->customer;
        $cartHas = CartHas::where('CART_ID', $cartId)->get();

        $errors = Order::saveFromRequest($request);

        if (!$errors->isEmpty()) {
            return response()->view('payment.index', [
                'cartHas' => $cartHas,
                'customer' => $customer,
                'cartId' => $cartId,
            ], 400);
        }

        $url = '/'; // Thay đổi đường dẫn theo nhu cầu của bạn

        return response()->json([
            'url' => $url,
            'status' => "OK",
            'message' => "Đặt hàng thành công!"
        ], 200);
    }
}
