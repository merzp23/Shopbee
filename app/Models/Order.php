<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

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
}
