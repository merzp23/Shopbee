<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerBify</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="navbar-brand m-0">VERBIFY</h1>
                <nav class="navbar navbar-expand-md p-0">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="header-buttons">
                    <a href="#" class="btn btn-light btn-sm">Login</a>
                    <a href="#" class="btn btn-success btn-sm">Sign Up</a>
                </div>
            </div>
        </div>
    </header>
    
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Billing Data</h2>
                <form class="billing-data">
                    <input type="text" class="form-control" placeholder="Name">
                    <input type="email" class="form-control" placeholder="Email">
                    <input type="text" class="form-control" placeholder="Phone Number">
                    <input type="text" class="form-control" placeholder="City/Province">
                    <input type="text" class="form-control" placeholder="City/District">
                    <input type="text" class="form-control" placeholder="Town">
                    <input type="text" class="form-control" placeholder="Ward">
                    <input type="text" class="form-control" placeholder="Shipping Address">
                    <input type="text" class="form-control" placeholder="Voucher Code">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="createAccount">
                        <label class="form-check-label" for="createAccount">Create an account?</label>
                    </div>
                    <textarea class="form-control" placeholder="Order Notes" rows="3"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            
            <div class="col-md-6">
                <h2>Your Orders</h2>
                <div class="order-summary">
                    <table>
                        <thead>
                            <tr>
                                <th>Tên sách</th>
                                <th>Miêu tả</th>
                                <th>Số lượng</th>
                                <th>Giá tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->book->first()->NAME }}</td>
                                    <td>{{ $item->book->first()->DESCRIPTION }}</td>
                                    <td>{{ $item->QUANTITY }}</td>
                                    <td>{{ \App\Helpers\Functions::formatNumber($item->book->first()->PRICE) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tổng giá</th>
                                <th>{{ \App\Helpers\Functions::formatNumber($order->caculateTotalPrice()) }}đ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <h2>Payment</h2>
                <div class="payment-methods">
                    <div class="form-check">
                        <input type="radio" name="paymentMethod" value="cod" id="cod" class="form-check-input">
                        <label for="cod">Cash on Delivery</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="paymentMethod" value="card" id="card" class="form-check-input">
                        <label for="card">Card Payment</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="paymentMethod" value="paypal" id="paypal" class="form-check-input">
                        <label for="paypal">PayPal</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="paymentMethod" value="momo" id="momo" class="form-check-input">
                        <label for="momo">MoMo</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5">
        <div>
            <h4>VERBIFY</h4>
            <p>Come visit VerBify for yourself to learn more about our system and meet some of our educators. We offer high quality education.</p>
            <p><i class="fa fa-map-marker"></i> 27 Division St, New York, NY 10002, USA</p>
            <p><i class="fa fa-phone"></i> (+84) 888 551 7951</p>
            <p><i class="fa fa-envelope"></i> verbify@fpt.edu.vn</p>
            <div>
                <a href="#"><i class="fa fa-facebook-official"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
