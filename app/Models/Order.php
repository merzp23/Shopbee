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
        'recipe',
        'email',
        'phone_number',
        'province',
        'city',
        'town',
        'ward',
        'shipping_address',
        'voucher_code',
        'notes',
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

    public static function newDefault()
    {
        $order = new self();
        $order->PAYMENT_STATUS = self::PAYMENT_STATUS_UNPAID;
        
        return $order;
    }

    public function saveFromRequest($request)
    {
        $validator = Validator::make($request->all(), [
            'ORDER_DATE' => 'required',
            'ADDRESS' => 'required',
            'TOTAL_PRICE' => 'required',
            'PAYMENT_TYPE' => 'required',
            'recipe' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'town' => 'required',
            'ward' => 'required',
            'shipping_address' => 'required',
            'voucher_code' => 'required',
        ]);
    
        $this->fill($request->all());

        $cartId = $request->cart_id;
        $customer = Cart::where('CART_ID', $cartId)->first()->customer;

        $this->CUSTOMER_ID = $customer->CUSTOMER_ID;
        $this->TOTAL_PRICE = Functions::convertStringPriceToNumber($request->TOTAL_PRICE);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $this->save();

        return $validator->errors();
    }

    public function setStatus($status)
    {
        $this->PAYMENT_STATUS = $status;
    }
}
