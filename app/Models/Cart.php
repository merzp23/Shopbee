<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public $timestamps = false;

    protected $fillable = [
        'CUSTOMER_ID',
    ];

    public function cartHas()
    {
        return $this->belongsTo(CartHas::class, 'CART_ID', 'CART_ID');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CUSTOMER_ID', 'CUSTOMER_ID');
    }
}
