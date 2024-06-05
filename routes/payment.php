<?php

use App\Http\Controllers\Sales\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentController;

Route::get('carts/{id}/payment/index', [PaymentController::class, 'index']);
Route::post('carts/{id}/payment/submit', [PaymentController::class, 'submit']);
