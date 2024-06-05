<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerBify</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

      <!--=============== BOOTSTRAP ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
          
    <!--=============== CSS ===============--> 
    <link rel="stylesheet" href="assets/css/style.css">
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
        display: none;
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
        animation: spin 1s linear infinite;
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
      @include('payment.form')
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
                      _this.showErrorMessage();

                      _this.self().html(res.responseText)

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
  <!--=============== MAIN JS ===============-->
  <script src="assets/js/main.js"></script>
  
  <!--=============== BOOSTRAP ===============--> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
