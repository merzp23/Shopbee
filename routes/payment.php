<?php

use App\Http\Controllers\Sales\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;


Route::get('orders/{id}/payment/index', [PaymentController::class, 'index']);
