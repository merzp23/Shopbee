<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerBify</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #ffffff;
        }
        header {
            background-color: #9e2894;
            padding: 10px 0;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link {
            margin-right: 20px;
        }
        .navbar-nav .nav-item:last-child .nav-link {
            margin-right: 0;
        }
        .header-buttons .btn {
            margin-left: 10px;
        }
        .billing-data input,
        .billing-data textarea {
            margin-bottom: 10px;
        }
        .order-summary {
            background-color: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
        }
        .order-summary table {
            width: 100%;
        }
        .order-summary th, .order-summary td {
            padding: 10px;
            text-align: left;
        }
        .order-summary th {
            background-color: #9e2894;
            color: #ffffff;
        }
        .order-summary tfoot th {
            font-size: 1.2em;
        }
        .payment-methods label {
            display: flex;
            align-items: center;
        }
        .payment-methods input {
            margin-right: 10px;
        }
        .form-check-label {
            margin-left: 25px;
        }
        footer {
            background-color: #fcd564;
            padding: 20px 0;
        }
        footer h4, footer p, footer a {
            color: #000000;
        }
        footer a {
            margin: 0 10px;
        }
    </style>
</head>
<body>

  <style>
    .spinner-container {
        display: none; /* Ban đầu ẩn spinner */
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
    }

    .spinner {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        animation: spin 1s linear infinite; /* Sử dụng animation CSS */
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

  </style>
  <div class="spinner-container">
      <div class="spinner"></div>
  </div>

  <style>
    .alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        display: none;
    }

  </style>
  <div id="successMessage" class="alert alert-success" style="display: none;">
      Đặt hàng thành công!
  </div>

  <div id="errorMessage" class="alert alert-danger" style="display: none;">
      Đã xảy ra lỗi trong quá trình đặt hàng. Vui lòng thử lại!
  </div>

    <!--==============HEADER==================-->
  <header class="header container-fluid">
    <ul class="nav navbar container">
      <li>
        <a href="#" class="nav_brand">
          <h1 class = "display-5">Verbify</h1>
        </a>
      </li>
      
      <li class = "col-5 d-md-inline d-none search_box">
        <form action = "#" method="post" class="py-1 px-3">
          <input name="search" placeholder="Snow White and the Seven Dwarfs..." maxlength="100">
          <button type="submit" class = "search-btn fs-5">
            <i class = "bx bx-search-alt"></i>
          </button>
        </form>   
      </li>

      <li class="search_box_hide col-4 shadow">
        <form action = "#" method="post" class="py-1 px-3">
          <input name="search" class = "fs-7" placeholder="Search..." maxlength="100">
          <button type="submit" class = "search-btn fs-5">
            <i class = "bx bx-search-alt"></i>
          </button>
        </form>   
      </li>

      <li class="header_icons col-md-auto text-end fs-4"> 
        <div id="search-btn" class = "p-1 d-md-none d-inline">
          <i class = "bx bx-search-alt"></i>
        </div>
        <div id="cart-btn" class = "p-1">
          <i class = "bx bx-cart-alt"></i>
        </div>
        <div id="user-btn" class = "p-1">
          <i class = "bx bx-user-circle"></i>
        </div>
      </li>
    </ul>
  </nav>
</header>
    @php
        $paymentFormUniqId = 'payment_form_' . uniqId();
    @endphp
    <form form-data="{{ $paymentFormUniqId }}" class="billing-data">
    @csrf
    <input type="hidden" name="cart_id" value="{{ $cartId }}">
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Thông tin thanh toán</h2>
                <br>
                <div class="form-outline">
                    <label class="required fs-6 fw-bold mb-2">Tên khách hàng</label>
                    <input type="text" class="bg-secondary text-white form-control mb-3" readonly value="{{ $customer->LAST_NAME . " " . $customer->FIRST_NAME }}" placeholder="Tên">
                </div>

                <div class="form-outline">
                    <label class="required fs-6 fw-bold mb-2">Địa chỉ</label>
                    <input type="text" name="ADDRESS" value="{{ $customer->ADDRESS }}" class="form-control mb-3" placeholder="Địa chỉ">
                </div>

                <div class="form-outline">
                    <label class="required fs-6 fw-bold pe-none mb-2">Ngày đặt hàng</label>
                    <input type="text" name="ORDER_DATE" class="bg-secondary text-white form-control mb-3" placeholder="Ngày thanh toán" value="<?php echo date('Y-m-d H:i:s'); ?>">
                </div>

                <h2>Phương thức thanh toán</h2>

                <div class="payment-methods">
                    <div class="form-check">
                        <input type="radio" name="PAYMENT_TYPE" value="cod" id="cod" class="form-check-input">
                        <label for="cod">Thanh toán lúc nhận hàng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="PAYMENT_TYPE" value="card" id="card" class="form-check-input">
                        <label for="card">Thẻ tín dụng</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="PAYMENT_TYPE" value="paypal" id="paypal" class="form-check-input">
                        <label for="paypal">PayPal</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="PAYMENT_TYPE" value="momo" id="momo" class="form-check-input">
                        <label for="momo">MoMo</label>
                    </div>
                </div>

                <div class="form-outline">
                  <label class="required fs-6 fw-bold pe-none mb-2">Loại thẻ thanh toán nếu thanh toán bằng thẻ (Vd: Vietinbank)</label>
                  <input type="text" name="PROVIDER" class="form-control mb-3" placeholder="Thẻ thanh toán">
              </div>
            </div>
            
            <div class="col-md-6">
                <h2>Đơn hàng của bạn</h2>
                <div class="order-summary">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên sách</th>
                                <th>Miêu tả</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;

                                foreach($cartHas as $item) {
                                    $total += \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->PRICE;
                                }
                                
                            @endphp

                            @foreach ($cartHas as $item)
                                <tr>
                                    <td>{{ \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->NAME }}</td>
                                    <td>{{ \App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->DESCRIPTION }}</td>
                                    <td>{{ \App\Helpers\Functions::formatNumber(\App\Models\book::where('BOOK_ID', $item->BOOK_ID)->first()->PRICE) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tổng giá</th>
                                <th class="d-flex justify-content-center align-items-center">
                                    <input type="text" class="form-control border-0 text-center py-o my-0 pe-5" readonly name="TOTAL_PRICE" value="{{ \App\Helpers\Functions::formatNumber($total) }}đ">
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="col-md-12 mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary mt-3">Thanh toán</button>
            </div>
        </div>
    </div>
    </form>

    <script>
        $(() => {
            new PaymentForm({
                self: () => {
                    return $('[form-data="{{ $paymentFormUniqId }}"]')
                },
                spinner: () => {
                    return $('.spinner-container');
                },
                successMessage: () => {
                    return $('#successMessage');
                },
                errorMessage: () => {
                    return $('#errorMessage');
                },
            });
        })

        var PaymentForm = class {
            constructor(options) {
                this.self = options.self;
                this.spinner = options.spinner;
                this.successMessage = options.successMessage;
                this.errorMessage = options.errorMessage;
                this.events();
            }

            submit() {
                const _this = this;

                _this.spinner().show();

                setTimeout(() => {
                  $.ajax({
                      url: "{{ action([App\Http\Controllers\PaymentController::class, 'submit'], ['id' => 1]) }}",
                      method: "POST",
                      data: this.self().serialize()
                  }).done(res => {
                      _this.showSuccessMessage();
                      _this.spinner().hide();
                      setTimeout(() => {
                        window.location.href = '/';
                      }, 700);
                  }).fail(res => {
                      console.error(res);
                      _this.showErrorMessage();

                      setTimeout(() => {
                        _this.hideErrorMessage();
                      }, 1500);
                      _this.spinner().hide();
                  });
                }, 2000);
            }

            showSuccessMessage() {
                this.successMessage().show();
            }

            hideSuccessMessage() {
                this.successMessage().hide();
            }

            showErrorMessage() { 
                this.errorMessage().show();
            }

            hideErrorMessage() { 
                this.errorMessage().hide();
            }

            events() {
                const _this = this;

                _this.self().on('submit', e => {
                    e.preventDefault();
                    _this.submit();
                })
            }
        }



    </script>

<!--==============FOOTER==================-->
<footer class="footer container-fluid text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="outro col-lg-6 col-md-12 mb-4 mb-md-0">
          <a href="#" class = "footer_brand h1">Verbify</a>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
            molestias. Fugiat pariatur maxime quis culpa corporis vitae.
          </p>
          <div class="icons footer_icons text-center fs-3">
            <a href="#" class="btn-facebook mx-1">
              <i class='bx bxl-facebook-circle'></i>
            </a>
            <a href="#" class="btn-github mx-1">
              <i class='bx bxl-github'></i>
            </a>
            <a href="#" class="btn-figma mx-1">
              <i class='bx bxl-figma'></i>
            </a>
          </div>
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="contact col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Our Contact</h5>
  
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!">
                <i class='bx bxs-home'></i>
                University of Information Technology
              </a>
            </li>
            <li>
              <a href="#!">
                <i class='bx bxs-phone'></i>
                (+84) 8484 14 64646
              </a>
            </li>
            <li>
              <a href="#!">
                <i class='bx bxl-gmail'></i>
                verbify@gmail.com
              </a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
  
        <!--Grid column-->
        <div class="links col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5>Links</h5>
  
          <ul class="list-unstyled">
            <li>
              <a href="#">Home</a>
            </li>
            <li>
              <a href="#">About us</a>
            </li>
            <li>
              <a href="#">Shop</a>
            </li>
            <li>
              <a href="#">Contact</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class=" copyright p-2">
      © All Rights Reserved - 2024 - Group 10
    </div>
    <!-- Copyright -->
  </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</html>
