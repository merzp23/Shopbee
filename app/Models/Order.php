<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Functions;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    public $timestamps = false;
    public const PAYMENT_STATUS_PAID = 'PAID';
    public const PAYMENT_STATUS_UNPAID = 'UNPAID';

    protected $fillable = [
        'ORDER_DATE',
        'ADDRESS',
        'PAYMENT_STATUS',
        'TOTAL_PRICE',
        'PAYMENT_TYPE',
        'PROVIDER',
        'CUSTOMER_ID',
    ];

    public function orderItems()
    {
        return $this->hasMany(order_item::class, 'ORDER_ID', 'ORDER_ID');
    }

    public function caculateTotalPrice()
    {
        $items = $this->orderItems;
        $totalPrice = 0;

        foreach($items as $item)
        {
            $price = $item->caculateTotalBooksPrice();
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    public static function saveFromRequest($request)
    {
        $validator = Validator::make($request->all(), [
            'ORDER_DATE' => 'required',
            'ADDRESS' => 'required',
            'TOTAL_PRICE' => 'required',
            'PAYMENT_TYPE' => 'required',
        ]);
    
        $order = new self();

        $order->fill($request->all());

        $cartId = $request->cart_id;
        $customer = Cart::where('CART_ID', $cartId)->first()->customer;

        $order->CUSTOMER_ID = $customer->CUSTOMER_ID;
        $order->TOTAL_PRICE = Functions::convertStringPriceToNumber($request->TOTAL_PRICE);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $order->save();

        return $validator->errors();
    }

    public function setStatus($status)
    {
        $this->PAYMENT_STATUS = $status;
    }
}
