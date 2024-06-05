<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $order = Order::first(); // Tạm thời lấy order đầu tiên, khi nào sửa xong phần giỏ hàng thì lấy id của order tryền vào để lấy ra order này <3.
        
        return response()->view('payment.index', [
            'order' => $order
        ]);
    }
}
