
    @csrf
    <input type="hidden" name="cart_id" value="{{ $cartId }}">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2 class="fw-bold text-center fs-3" style="font-weight: 700">Billing data</h2>
                <br>
                <div class="form-outline d-none">
                    <label class="required fs-6 fw-bold mb-2 pe-none">Tên khách hàng</label>
                    <input type="text" class="bg-secondary text-white form-control mb-3 pe-none" readonly value="{{ $customer->LAST_NAME . " " . $customer->FIRST_NAME }}" placeholder="Tên">
                </div>

                <div class="form-outline d-none">
                    <label class="required fs-6 fw-bold mb-2">Địa chỉ</label>
                    <input type="text" name="ADDRESS" value="{{ $customer->ADDRESS }}" class="form-control mb-3" placeholder="Địa chỉ">
                </div>

                <div class="form-outline d-none">
                    <label class="required fs-6 fw-bold pe-none mb-2">Ngày đặt hàng</label>
                    <input type="text" readonly name="ORDER_DATE" class="bg-secondary text-white form-control mb-3 pe-none" placeholder="Ngày thanh toán" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>

                <div class="form-outline">
                  <input type="text" name="recipe" value="{{ isset($order->recipe) ? $order->recipe : '' }}" class="form-control mb-3" placeholder="Recipe">
                  <x-input-error :messages="$errors->get('recipe')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="email" value="{{ isset($order->email) ? $order->email : '' }}" class="form-control mb-3" placeholder="Email">
                  <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="phone_number" value="{{ isset($order->phone_number) ? $order->phone_number : '' }}" class="form-control mb-3" placeholder="Phone number">
                  <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="province" value="{{ isset($order->province) ? $order->province : '' }}" class="form-control mb-3" placeholder="City/Province">
                  <x-input-error :messages="$errors->get('province')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="city" value="{{ isset($order->recipe) ? $order->recipe : '' }}" class="form-control mb-3" placeholder="City/District">
                  <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="town" value="{{ isset($order->town) ? $order->town : '' }}" class="form-control mb-3" placeholder="Town">
                  <x-input-error :messages="$errors->get('town')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="ward" value="{{ isset($order->ward) ? $order->ward : '' }}" class="form-control mb-3" placeholder="Ward">
                  <x-input-error :messages="$errors->get('ward')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="shipping_address" value="{{ isset($order->shipping_address) ? $order->shipping_address : '' }}" class="form-control mb-3" placeholder="Shipping address">
                  <x-input-error :messages="$errors->get('shipping_address')" class="mt-2"/>
                </div>

                <div class="form-outline">
                  <input type="text" name="voucher_code" value="{{ isset($order->voucher_code) ? $order->voucher_code : '' }}" class="form-control mb-3" placeholder="Voucher code">
                </div>

                <div class="form-outline">
                    <input type="checkbox" name="is_create_new_account" id="is_create_new_account">
                    <label class="required fs-6 fw-bold mb-2" for="is_create_new_account">Create an account?</label>
                </div>
                
                <div class="form-outline">
                    <textarea name="notes" id="" cols="30" rows="4">{{ isset($order->notes) ? $order->notes : '' }}</textarea>
                </div>
            </div>
            
            <style>
                .image-container {
                    position: relative;
                }
                .sticky-img {
                    position: absolute;
                    top: -20px;
                    right: 0;
                    z-index: 1000; 
                    background-color: white;
                }
            </style>

            <div class="col-md-6 image-container">
                <div class="sticky-img">
                    <img src="{{ asset('img/442725900_1575793763042534_8209290147244241046_n.png') }}" alt="MoMo" style="width: 100px; height: 100px;">
                </div>
              <div class="row">
                <h2 class="fw-bold fs-3 text-center" style="font-weight: 700">Your orders</h2>
              </div>
                <style>
                  .product-list {
                      width: 400px;
                      border: 2px solid #ccc;
                      border-radius: 10px;
                      background-color: #fff;
                      overflow: hidden;
                      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  }
                  .product-list .header {
                      background-color: #800080;
                      color: white;
                      text-align: center;
                      padding: 15px 0;
                      font-size: 1.7em;
                      font-weight: 900
                  }
                  .product-list .product {
                      display: flex;
                      justify-content: space-between;
                      padding: 10px 20px;
                      border-bottom: 1px solid #ccc;
                  }
                  .product-list .product:last-child {
                      border-bottom: none;
                  }
                  .product-list .product img {
                      max-width: 40px;
                      max-height: 60px;
                      margin-right: 10px;
                  }
                  .product-list .product-details {
                      flex-grow: 1;
                  }
                  .product-list .product-name {
                      font-size: 0.9em;
                      margin: 0;
                  }
                  .product-list .product-price {
                      font-weight: bold;
                      color: black;
                  }
                  .product-list .total {
                      font-weight: bold;
                      text-align: center;
                      padding: 15px 0;
                      background-color: #f2f2f2;
                      font-size: 1.7em;
                      font-weight: 900
                  }
                </style>

                @php
                  $total = 0;

                  foreach($cartHas as $item) {
                      $total += $item->quantity * \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->PRICE;
                  }
                @endphp

                <div class="product-list mt-5" style="width: 650px">
                  <div class="header"><span class="fw-bold fs-2">Product</span></div>

                  @foreach ($cartHas as $item)
                    <div class="product">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-2 mb-2">
                                <img src="{{ \App\Models\BookImage::where('BOOK_ID', $item->BOOK_ID)->first()->IMAGE_LINK }}" alt="">
                            </div>

                            <div class="product-details col-lg-8 col-md-8 col-sm-8 col-8 mb-8">
                                <div class="row">
                                    <span class="product-name fw-bold">{{ \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->NAME }}</span>
                                    <span class="product-name">{{ \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->DESCRIPTION }}</span>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">  
                                        <span class="fw-light" style="font-size: 13px">x{{ $item->quantity }}</span>
                                    </div>

                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                        <span class="fw-light" style="font-size: 13px">{{ \App\Helpers\Functions::formatNumber(\App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->PRICE) }}đ</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="product-price col-lg-2 col-md-2 col-sm-2 col-2 mb-2 d-flex justify-content-center align-items-center">
                                <span style="font-size: 20px">
                                    {{ \App\Helpers\Functions::formatNumber(\App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->PRICE * $item->quantity) }}đ
                                </span>
                            </div>
                        </div>
                        
                    </div>
                  @endforeach

                  <input type="hidden" class="total pe-none boder-none" name="TOTAL_PRICE" value="{{ $total }}">
                  <div class="total">{{ \App\Helpers\Functions::formatNumber($total) }}đ</div>
                </div>

                <div class="ms-5">
                    <h2 class="mt-5 mb-3 fw-bold">Payment</h2>

                    <div class="payment-methods">
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="cod" id="cod" class="form-check-input">
                            <label for="cod">
                                <img src="{{ asset('img/445382872_815712160506317_5280714423288141267_n.png') }}" alt="COD" style="width: 50px; height: 50px;">
                                <span class="ps-4">Cash on Delivery</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="card" id="card" class="form-check-input">
                            <label for="card">
                                <img src="{{ asset('img/445386563_996711298755513_4868818802037556907_n.png') }}" alt="Credit Card" style="width: 50px; height: 50px;">
                                <span class="ps-4">Card Payment</span>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="paypal" id="paypal" class="form-check-input">
                            <label for="paypal">
                                <img src="{{ asset('img/445375933_768209842141949_5931313413035790528_n.png') }}" alt="PayPal" style="width: 50px; height: 50px;">
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="PAYMENT_TYPE" value="momo" id="momo" class="form-check-input">
                            <label for="momo">
                                <img src="{{ asset('img/445382833_818944953118810_4417129999551849925_n.png') }}" alt="MoMo" style="width: 50px; height: 50px;">
                                                </label>
                        </div>
                        <x-input-error :messages="$errors->get('PAYMENT_TYPE')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5 d-flex justify-content-center">
                <button type="submit" class="btn mt-3" style="background-color: #800080; color: white; font-weight: bold; font-size: 1.1em; padding-top: 7px 22px 7px;">Submit</button>
            </div>
        </div>
    </div>