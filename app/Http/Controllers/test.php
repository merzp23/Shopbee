<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Order;
use Illuminate\Http\Request;

class test extends Controller
{
    public function index(){
        $test = Order::all();
        dd($test);
        return view('test');
    }
}
