<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <!--=============== BOOTSTRAP ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        .shopping_cart h1{
            font-weight:bold;
            color: var(--dark-color);
        }
        .title, .item_gio_hang {
            display: grid;
            grid-template-columns: 8% 20% 20% 15% 15% 10% 10%;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-top:30px;
        }
        .title {
            background-color: #f1f1f1;
            font-weight: bold;
        }

        .title div, .item_gio_hang div {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hinh_anh img {
            width: 80px;
        }
        .item_gio_hang {
            background-color: #fff9c4;
        }
        .soluong {
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: .3rem;
            border: 1px solid black;
        }
        .soluong input[type="text"] {
            text-align: center;
        }
        .ten{
            text-transform: capitalize;
            font-weight:bold;
            text-align: left;
            color: var(--main-color-dark);
        }

        .btn-minus, .btn-plus {
            border: 1px solid black;
            cursor: pointer;
            background-color: white;
        }
        .btn-link i{
            color: var(--main-color);
        }
        .xoa {
            cursor: pointer;
            color: purple;
            text-align: center;
        }
        .summary-bar {
            display: flex;
            justify-content: center;
            width: 100%;
        }
        .summary-bar .total-amount{
            color:black;
            font-weight:bolder;
        }
        .btn-order{
            background-color: var(--main-color);
            border-radius: .4rem;
            font-weight:bold;
            color:white;
        }
        .btn-order:hover{
            background-color: var(--main-color-light);
        }

        /*===============  related product ===============*/
        .genres{
            .container{
                background-color: var(--light-bg);
                border-radius: .5rem;
            }
            .row{
                align-items: center;
                justify-content: space-between;
                text-align: center;
            }
            .col {display: flex;
                align-items: center;
                justify-content: center;}
            .book_item{
                background: var(--light-bg);
                border-radius: .75rem;
                transition:box-shadow .35s ease;
                padding-top: 2rem;
                margin-bottom: 3rem;
                overflow: hidden;
            }

            .book_item:hover{
                box-shadow:0px 0px 10px rgba(24, 24, 24, 0.3);
            }

            .book_img{
                height: 200px;
                margin-bottom: .75rem;
                transition: .3s;
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
            }

            .book_img img{
                display: block;
                max-width: 200px;
                max-height: 100%;
            }

            .book_info{
                position: relative;
                display: flex;
                flex-direction: column;
            }

            .products .book_price{
                margin-bottom: .75rem;
            }

            .book_img img{
                display: block;
                max-width: 200px;
                max-height: 100%;
            }
            .book_title a{ color : black;}
        }

        .section_title{
            font-family: var(--first-font) ;
            text-align: left;
            font-size: 2rem;
            font-weight: bold;
        }

        hr{
            width: 100%;
            height: .6rem;
            background-color: var(--second-color-dark);
        }
        .genres_img{
            background-color: transparent;
            border-radius: .5rem;
            max-width: 150px;
            max-height: 190px;
            overflow: hidden;

            height: 100%;
        }

        .genres_img img{
            height: 100%;
            object-fit: cover;
            border-radius: .5rem;
        }

        .genres_img{
            display:flex;
            justify-content: center;
            align-items: center;
            transition: transform .7s, box-shadow .8s;
        }

        .genres_img:hover{
            transform: scale(1.15);
            box-shadow:0px 0px 10px rgba(24, 24, 24, 0.3);
        }

        .genres_name{
            font-weight: bold;
            color: var(--dark-color);
        }

        .genres_name:hover{
            color: var(--fourth-color-dark-alt);
        }
        ::-webkit-scrollbar {
            display: none;
        }
        a:hover{
            text-decoration: none;
        }
    </style></head>

{{--    <!--==============HEADER==================-->--}}
{{--    <header class="header container-fluid">--}}
{{--        <ul class="nav navbar container">--}}
{{--            <li>--}}
{{--                <a href="{{route('home')}}" class="nav_brand">--}}
{{--                    <h1 class = "display-5">Verbify</h1>--}}
{{--                </a>--}}
{{--            </li>--}}


{{--            <li class = "col-5 d-md-inline d-none search_box">--}}
{{--                <form action = "{{route('shop.search')}}" method="POST" class="py-1 px-3">--}}
{{--                    @csrf--}}
{{--                    <input name="search" id = "searchbox" placeholder="Snow White and the Seven Dwarfs..." maxlength="100">--}}
{{--                    <button type="submit" class = "search-btn fs-5 pt-1">--}}
{{--                        <i class = "bx bx-search-alt"></i>--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </li>--}}
{{--            <li class="icons col-md-auto text-end fs-4">--}}
{{--                <div id="search-btn" class = "p-1 d-md-none d-inline">--}}
{{--                    <i class = "bx bx-search-alt"></i>--}}
{{--                </div>--}}
{{--                <div id="cart-btn" class = "p-1">--}}
{{--                    <a href="{{route('cart.index')}}">--}}
{{--                        <i class = "bx bx-cart-alt fs-4" style="color: white;"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div id="user-btn" class = "p-1">--}}
{{--                    <a href="{{route('profile')}}"><i class = "@if(Auth::check()) bx bxs-user-circle @else bx bx-user-circle @endif fs-4" style="color: white;"></i></a>--}}
{{--                </div>--}}
{{--            </li>--}}

{{--        </ul>--}}
{{--        </nav>--}}
{{--    </header>--}}

@include('layout.header')
    <main>
        <section class="shopping_cart py-5">
            <div class="container">
                <h1 class = "text-center">Your Shopping Cart</h1>
                <div class="title">
                    <div class="box"><input type="checkbox" id="select-all" class="tick" style="display:none;"></div>
                    <div class="fs-3">Product</div>
                    <div class="fs-3">Name</div>
                    <div class="fs-3">Price</div>
                    <div class="fs-3">Quantity</div>
                    <div class="fs-3">Total</div>
                </div>

                @if($cart==null)
                    <div class="fs-4 text-center p-3">
                    There are no product in cart.
                    </div>
                @endif
                @foreach($cart as $item)
                    <div class="item_gio_hang">
                        <div class="box"><input type="checkbox" class="tick" style="display:none;"></div>
                        <div class="hinh_anh fs-4"><img src="{{ $item->IMAGE_LINK }}" alt="{{ $item->NAME }}"></div>
                        <div class="ten fs-4">{{ $item->NAME }}</div>
                        <div class="gia fs-4"><span class="giaban">{{ $item->PRICE}} $</span></div>
                        <div class="soluong fs-4 row">
                            <button type="submit" class="btn-minus col-3" data-urlUpdate="{{ route('cart.update', $item->BOOK_ID) }}" data-urlDel="{{ route('cart.remove', $item->BOOK_ID) }} ">-</button>
                            <input type="text" value="{{ $item->QUANTITY }}" min="1" max="100" class="quantity col-6" readonly>
                            <button type="submit" class="btn-plus col-3" data-urlUpdate="{{ route('cart.update', $item->BOOK_ID) }}">+</button>
                        </div>
                        <div class="tongtien fs-4">{{$item->QUANTITY * $item->PRICE}} $</div>
                        <div class="xoa">
                            <button type="submit" class="btn btn-link p-0 m-0" data-bookId="{{ $item->BOOK_ID }}" data-urlDel="{{ route('cart.remove', $item->BOOK_ID) }} ">
                                <i class='bx bxs-trash-alt fs-4'></i>
                            </button>
                        </div>
                    </div>
                @endforeach

                <div class ="summary-bar mt-4 d-flex justify-content-end">
                    <div class="total-amount fs-2 mr-5">Total: <span id="total-price"></span></div>
                    <button class="btn btn-order fs-4" onclick="placeOrder()">Order</button>
                </div>
            </div>
        </section>

        <section class="genres">
            <div class="container py-2 py-md-4 px-4 mb-5">
                <div class="section_title mb-3">
                    <h4>Suggested Books</h4>
                    <hr class="hr1">
                </div>
                <div class="row">
                    @foreach($suggestedBooks as $book)
                        <div class="col">
                            <div class="book_item">
                                <a href="{{route('book.detail',$book->BOOK_ID)}}"  class="book_img"><img src="{{$book->images->first()->IMAGE_LINK}}" alt="img"></a>
                                <div class="book_info px-4 py-2">
                                    <div class="book_title fs-5"><a href="{{route('book.detail',$book->BOOK_ID)}}">{{$book->NAME}}</a></div>
                                    <div class="book_author fs-5">{{$book->AUTHOR}}</div>
                                    <div class="book_price fs-5">${{$book->PRICE}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
<script>
    let minus=0;
    document.addEventListener('DOMContentLoaded', () => {
        const selectAllCheckbox = document.getElementById('select-all');
        let checkboxes = document.querySelectorAll('.item_gio_hang .tick');
        const totalPriceElement = document.getElementById('total-price');

        // Cập nhật tổng số tiền
        function updateTotal() {
            let total = 0;
            checkboxes.forEach((checkbox) => {

                const item = checkbox.closest('.item_gio_hang');
                const quantity = parseInt(item.querySelector('.quantity').value);
                const itemPriceElement = item.querySelector('.giaban').innerText;
                const itemPrice = parseInt(itemPriceElement.replace(' đ', '').replace(/\./g, ''));
                total += itemPrice * quantity;
            });
            totalPriceElement.innerText = (total/100-minus).toLocaleString('en-US') + ' $';
        }

        // Chọn hoặc bỏ chọn tất cả sản phẩm
        selectAllCheckbox.addEventListener('change', () => {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateTotal();
        });

        // Khi checkbox sản phẩm thay đổi trạng thái
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                if (!checkbox.checked) {
                    selectAllCheckbox.checked = false;
                }
                updateTotal();
            });
        });

        // Nút tăng số lượng sản phẩm
        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', (e) => {
                const input = e.target.previousElementSibling;
                let itemQuantity = parseInt(input.value) + 1;
                itemQuantity = parseInt(itemQuantity);
                input.value = itemQuantity;
                const item = e.target.closest('.item_gio_hang');
                const itemPriceElement = item.querySelector('.giaban').innerText;
                const itemPrice = parseInt(itemPriceElement.replace(' đ', '').replace(/\./g, ''));
                item.querySelector('.tongtien').innerText = (itemPrice * parseInt(itemQuantity)/100).toLocaleString('vi-VN') + ' $';
                updateTotal();

                let post =  JSON.stringify({quantity: itemQuantity, _token: "{{ csrf_token() }}"})
                const url = button.getAttribute("data-urlUpdate");
                let xhr = new XMLHttpRequest()
                xhr.open('POST', url, true)
                xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
                xhr.send(post);
                xhr.onload = function () {
                    if(xhr.status === 201) {
                        console.log("Post successfully created!")
                    }
                }
            });
        });

        // Nút giảm số lượng sản phẩm
        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', (e) => {
                const input = e.target.nextElementSibling;
                let itemQuantity = parseInt(input.value) - 1;
                if (parseInt(itemQuantity) > 0) {
                    itemQuantity = parseInt(itemQuantity);
                    input.value = itemQuantity;
                    const item = e.target.closest('.item_gio_hang');
                    const itemPriceElement = item.querySelector('.giaban').innerText;
                    const itemPrice = parseInt(itemPriceElement.replace(' đ', '').replace(/\./g, ''));
                    item.querySelector('.tongtien').innerText = (itemPrice * parseInt(itemQuantity)/100).toLocaleString('vi-VN') + ' $';

                    let post =  JSON.stringify({quantity: itemQuantity, _token: "{{ csrf_token() }}"})
                    const url = button.getAttribute("data-urlUpdate");
                    let xhr = new XMLHttpRequest()
                    xhr.open('POST', url, true)
                    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
                    xhr.send(post);
                    xhr.onload = function () {
                        if(xhr.status === 201) {
                            console.log("Post successfully created!")
                        }
                    }
                } else {
                    const item = e.target.closest('.item_gio_hang');
                    const itemPriceElement = item.querySelector('.giaban').innerText;
                    const itemPrice = parseInt(itemPriceElement.replace(' đ', '').replace(/\./g, ''));
                    minus+=(itemPrice/100);

                    let data =  JSON.stringify({ _token: "{{ csrf_token() }}"})
                    const url = button.getAttribute("data-urlDel");
                    let xhr = new XMLHttpRequest()
                    xhr.open('DELETE', url, true)
                    xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
                    xhr.send(data);
                    xhr.onload = function () {
                        if(xhr.status === 201) {
                            console.log("Deleted successfully !")
                        }
                    }
                    deleteProduct(button);
                }
                updateTotal();

            });
        });
        document.querySelectorAll('.btn-link').forEach(button => {
            button.addEventListener('click', (e) => {
                let data =  JSON.stringify({ _token: "{{ csrf_token() }}"})
                const url = button.getAttribute("data-urlDel");
                let xhr = new XMLHttpRequest()
                xhr.open('DELETE', url, true)
                xhr.setRequestHeader('Content-type', 'application/json; charset=UTF-8')
                xhr.send(data);
                xhr.onload = function () {
                    if(xhr.status === 201) {
                        console.log("Deleted successfully !")
                    }
                }
                deleteProduct(button);


            });
        })

        // Khi số lượng sản phẩm thay đổi
        document.querySelectorAll('.quantity').forEach(input => {
            input.addEventListener('change', (e) => {
                const item = e.target.closest('.item_gio_hang');
                const itemPriceElement = item.querySelector('.giaban').innerText;
                const itemPrice = parseInt(itemPriceElement.replace(' đ', '').replace(/\./g, ''));
                item.querySelector('.tongtien').innerText = (itemPrice * parseInt(e.target.value)).toLocaleString('vi-VN') + ' đ';
                updateTotal();
            });
        });

        // Khởi tạo tổng giá tiền khi tải trang
        updateTotal();
    });

    // nút order
    function placeOrder() {
        window.location.href = 'payment/index';
    }
    document.querySelector('.btn-order').addEventListener('click', placeOrder);



    // Chức năng xóa sản phẩm
    function deleteProduct(element) {
        const cartItem = element.closest('.item_gio_hang'); // Tìm phần tử cha `.cart-item` gần nhất
        if (cartItem) {
            cartItem.classList.add('fade-out'); // Thêm lớp fade-out để kích hoạt hiệu ứng fade out
            setTimeout(function() {
                cartItem.remove(); // Loại bỏ phần tử `.cart-item` sau khi hoàn thành hiệu ứng fade out
                updateTotalProducts(); // Cập nhật tổng số sản phẩm
            }, 1000); // Chờ 0.3s (giống với thời gian transition trong CSS)
        }


    }
</script>

{{--<main>--}}
{{--    <section class="shopping_cart">--}}

{{--        <div class="container">--}}
{{--            <h1>Your Shopping Cart</h1>--}}
{{--            <div class="title">--}}
{{--                <div class="box" style="display: none" >--}}
{{--                    <input type="checkbox" id="select-all" class="tick">--}}
{{--                </div>--}}
{{--                <div class="hinh_anh">Product</div>--}}
{{--                <div class="ten">Name</div>--}}
{{--                <div class="gia">Price</div>--}}
{{--                <div class="soluong">Quantity</div>--}}
{{--                <div class="tongtien">Total</div>--}}
{{--                <div class="xoa">Delete</div>--}}
{{--            </div>--}}

{{--            @foreach($cart as $item)--}}
{{--                <div class="item_gio_hang">--}}
{{--                    <div class="box" style="display: none">--}}
{{--                        <input type="checkbox" class="tick">--}}
{{--                    </div>--}}
{{--                    <div class="hinh_anh">--}}
{{--                        <img src="{{ $item->IMAGE_LINK }}" alt="{{ $item->NAME }}">--}}
{{--                    </div>--}}
{{--                    <div class="ten ms-3">{{ $item->NAME }}</div>--}}
{{--                    <div class="gia">--}}
{{--                        <span class="giaban">{{ $item->PRICE}} $</span>--}}
{{--                    </div>--}}
{{--                    <div class="soluong">--}}
{{--                        <button type="submit" class="btn-minus" data-urlUpdate="{{ route('cart.update', $item->BOOK_ID) }}" data-urlDel="{{ route('cart.remove', $item->BOOK_ID) }} ">-</button>--}}

{{--                        <input type="text" value="{{ $item->QUANTITY }}" min="1" max="100" class="quantity" readonly>--}}

{{--                        <button type="submit" class="btn-plus" data-urlUpdate="{{ route('cart.update', $item->BOOK_ID) }}">+</button>--}}
{{--                    </div>--}}
{{--                    <div class="tongtien">{{$item->QUANTITY * $item->PRICE}} $</div>--}}
{{--                    <div class="xoa">--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0" data-bookId="{{ $item->BOOK_ID }}" data-urlDel="{{ route('cart.remove', $item->BOOK_ID) }} "><i class="fa-solid fa-trash"></i></button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="summary-bar">--}}
{{--            <div class="total-amount">Total: <span id="total-price"></span></div>--}}
{{--            <button class="btn-order" onclick="placeOrder()">Order</button>--}}
{{--        </div>--}}

{{--        </div>--}}
{{--    </section>--}}
{{--    <section class="san-pham-lien-quan container-fluid genrens">--}}
{{--        <h2>Suggested Products</h2>--}}
{{--        <div class="danh-sach-san-pham">--}}
{{--            @foreach($suggestedBooks as $book)--}}
{{--                <a href="{{route('book.detail',$book->BOOK_ID)}}">--}}
{{--                    <div class="san-pham">--}}
{{--                        <img src="{{ $book->images->first()->IMAGE_LINK }}" alt="{{ $book->NAME }}">--}}
{{--                        <h3>{{ $book->NAME }}<br>&nbsp;</h3>--}}
{{--                        <p>{{ $book->DESCRIPTION }}</p>--}}
{{--                        <span class="gia">{{$book->PRICE}} $</span>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
{{--</main>--}}


    @include('layout.footer')

{{--    <!--==============FOOTER==================-->--}}
{{--    <footer class="footer container-fluid text-center text-lg-start">--}}
{{--        <!-- Grid container -->--}}
{{--        <div class="container p-4">--}}
{{--            <!--Grid row-->--}}
{{--            <div class="row">--}}
{{--                <!--Grid column-->--}}
{{--                <div class="outro col-lg-6 col-md-12 mb-4 mb-md-0">--}}
{{--                    <a href="#" class = "footer_brand h1">Verbify</a>--}}
{{--                    <p>--}}
{{--                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis--}}
{{--                        molestias. Fugiat pariatur maxime quis culpa corporis vitae.--}}
{{--                    </p>--}}
{{--                    <div class="icons footer_icons text-center fs-3">--}}
{{--                        <a href="#" class="btn-facebook mx-1">--}}
{{--                            <i class='bx bxl-facebook-circle'></i>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="btn-github mx-1">--}}
{{--                            <i class='bx bxl-github'></i>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="btn-figma mx-1">--}}
{{--                            <i class='bx bxl-figma'></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Grid column-->--}}

{{--                <!--Grid column-->--}}
{{--                <div class="contact col-lg-3 col-md-6 mb-4 mb-md-0">--}}
{{--                    <h5>Our Contact</h5>--}}

{{--                    <ul class="list-unstyled mb-0">--}}
{{--                        <li>--}}
{{--                            <a href="#!">--}}
{{--                                <i class='bx bxs-home'></i>--}}
{{--                                University of Information Technology--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#!">--}}
{{--                                <i class='bx bxs-phone'></i>--}}
{{--                                (+84) 8484 14 64646--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#!">--}}
{{--                                <i class='bx bxl-gmail'></i>--}}
{{--                                verbify@gmail.com--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!--Grid column-->--}}

{{--                <!--Grid column-->--}}
{{--                <div class="links col-lg-3 col-md-6 mb-4 mb-md-0">--}}
{{--                    <h5>Links</h5>--}}

{{--                    <ul class="list-unstyled">--}}
{{--                        <li>--}}
{{--                            <a href="#">Home</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">About us</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Shop</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="#">Contact</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!--Grid column-->--}}
{{--            </div>--}}
{{--            <!--Grid row-->--}}
{{--        </div>--}}
{{--        <!-- Grid container -->--}}

{{--        <!-- Copyright -->--}}
{{--        <div class=" copyright p-2">--}}
{{--            © All Rights Reserved - 2024 - Group 10--}}
{{--        </div>--}}
{{--        <!-- Copyright -->--}}
{{--    </footer>--}}

{{--    <!--=============== SCROLL UP ===============-->--}}
{{--    <a href="#" class="scrollup shadow" id="scroll-up">--}}
{{--        <i class='bx bx-up-arrow-alt scrollup__icon'></i>--}}
{{--    </a>--}}

{{--    <script src="script.js"></script>--}}


    </body>
</html>





{{--<style>--}}
{{--    /*=============== GOOGLE FONTS ===============*/--}}
{{--    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=League+Spartan:wght@300&display=swap');--}}

{{--    :root{--}}
{{--        /*========== Colors ==========*/--}}

{{--        --main-color: hsl(302, 60%, 33%);--}}
{{--        --main-color-dark: #39245F;--}}
{{--        --main-color-light: rgba(204, 148, 213, 1);--}}
{{--        --main-color-lighter: hsl(314, 60%, 62%);--}}

{{--        --second-color: rgba(247, 233, 161, 1);--}}

{{--        --third-color: rgba(9, 177, 171, 1);--}}

{{--        --fourth-color:hsl(30, 100%, 82%);--}}
{{--        --fourth-color-dark:hsl(14, 91%, 50%);--}}
{{--        --fourth-color-dark-alt:hsl(14, 91%, 45%);--}}

{{--        --white-color: hsl(0, 0%, 100%);--}}
{{--        --dark-color: hsl(0, 8%, 28%);--}}

{{--        --light-bg:#eee;--}}
{{--        --black:#2c3e50;--}}
{{--        --border:.1rem solid rgba(0,0,0,.2);--}}

{{--        /*========== Font and typography ==========*/--}}
{{--        --body-font: "League Spartan", sans-serif;--}}
{{--        --second-font: "Fredoka", sans-serif;--}}

{{--        /*========== z index ==========*/--}}
{{--        --z-fixed: 100;--}}
{{--    }--}}

{{--    *{--}}
{{--        margin:0; padding:0;--}}
{{--        box-sizing: border-box;--}}
{{--        outline: none;--}}
{{--        border:none;--}}
{{--        text-decoration: none;--}}
{{--    }--}}

{{--    a{--}}
{{--        text-decoration: none;--}}
{{--    }--}}

{{--    ul, li{--}}
{{--        text-decoration: none;--}}
{{--        list-style-type: none;--}}
{{--    }--}}



{{--    .button:hover{--}}
{{--        background-color: var(--dark-color);--}}
{{--    }--}}


{{--    /*===============  HEADER ===============*/--}}
{{--    header{--}}
{{--        background-color: var(--main-color);--}}

{{--        z-index: var(--z-fixed);--}}
{{--        box-shadow: 0 2px 16px hsla(0, 0%, 0%, .15);--}}
{{--        color: var(--white-color);--}}
{{--    }--}}

{{--    .nav_brand{--}}
{{--        color: var(--white-color);--}}
{{--        font-family: var(--second-font);--}}
{{--    }--}}

{{--    .search_box{--}}
{{--        border-radius: 1rem;--}}
{{--        background-color: var(--light-bg);--}}
{{--        form--}}
{{--        {--}}
{{--            display: flex;--}}
{{--        }--}}
{{--        input{--}}
{{--            width: 100%;--}}
{{--            background: none;--}}
{{--            font-family: var(--body-font);--}}
{{--            color: var(--main-color);--}}
{{--        }--}}
{{--        .search-btn{--}}
{{--            cursor: pointer;--}}
{{--            color:var(--black);--}}
{{--        }--}}
{{--        .search-btn :hover{--}}
{{--            color:var(--main-color);--}}
{{--        }--}}
{{--    }--}}

{{--    .search_box_hide{--}}
{{--        border-radius: 1rem;--}}
{{--        background-color: var(--light-bg);--}}
{{--        position: absolute;--}}
{{--        right: 2rem;--}}
{{--        top: 110%;--}}
{{--        text-align: center;--}}
{{--        transform-origin: top right;--}}
{{--        transform: scale(0);--}}
{{--        transition: .2s linear;--}}
{{--        form--}}
{{--        {--}}
{{--            display: flex;--}}
{{--        }--}}
{{--        input{--}}
{{--            width: 100%;--}}
{{--            background: none;--}}
{{--            font-family: var(--body-font);--}}
{{--            color: var(--main-color);--}}
{{--        }--}}
{{--        .search-btn{--}}
{{--            cursor: pointer;--}}
{{--            color:var(--black);--}}
{{--        }--}}
{{--        .search-btn :hover{--}}
{{--            color:var(--main-color);--}}
{{--        }--}}
{{--    }--}}

{{--    .icons{--}}
{{--        display: flex;--}}
{{--        div{--}}
{{--            margin-right: 1rem;--}}
{{--        }--}}
{{--        div:hover{--}}
{{--            background-color: var(--main-color-light);--}}
{{--            border-radius: .5rem;--}}
{{--            color: var(--white-color);--}}
{{--        }--}}
{{--    }--}}

{{--    .container h1 {--}}
{{--        text-align: center;--}}
{{--        margin-top: 50px;--}}
{{--        font-size: 25px;--}}
{{--        color:rgb(246, 208, 17);--}}

{{--    }--}}
{{--    .container {--}}
{{--        max-width: 800px;--}}
{{--        margin: 0 auto;--}}
{{--        padding: 0 10px;--}}

{{--    }--}}
{{--    .title, .item_gio_hang {--}}
{{--        display: grid;--}}
{{--        grid-template-columns: 8% 15% 20% 15% 20% 10% 10%;--}}
{{--        align-items: center;--}}
{{--        padding: 5px 0;--}}
{{--        border-bottom: 1px solid #ddd;--}}
{{--        margin-top:30px;--}}
{{--    }--}}
{{--    .title {--}}
{{--        background-color: #f1f1f1;--}}
{{--        font-weight: bold;--}}
{{--    }--}}
{{--    .title div, .item_gio_hang div {--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--        justify-content: center;--}}
{{--    }--}}
{{--    .hinh_anh img {--}}
{{--        width: 50px;--}}
{{--    }--}}
{{--    .item_gio_hang {--}}
{{--        background-color: #fff9c4;--}}
{{--        margin-top: 10px;--}}
{{--    }--}}
{{--    .soluong {--}}
{{--        display: flex;--}}
{{--        align-items: center;--}}
{{--        justify-content: center;--}}
{{--    }--}}
{{--    .soluong button, .soluong input {--}}
{{--        margin: 0;--}}
{{--        padding: 3px;--}}
{{--        font-size: 12px;--}}
{{--    }--}}
{{--    .soluong input[type="text"] {--}}
{{--        width: 30px;--}}
{{--        text-align: center;--}}
{{--    }--}}
{{--    .ten{--}}
{{--        text-transform: capitalize;--}}
{{--    }--}}

{{--    .btn-minus, .btn-plus {--}}
{{--        border: 1px solid #ccc;--}}
{{--        cursor: pointer;--}}
{{--        background-color: white;--}}
{{--    }--}}
{{--    input{--}}
{{--        margin:0 1px;--}}
{{--        width:49px;--}}
{{--        height:23px;--}}
{{--        font-size: 16px;--}}
{{--        text-align: center;--}}
{{--        border-radius: 0px;--}}
{{--        border: 1px solid #ccc;--}}
{{--    }--}}
{{--    input[type="checkbox"]{--}}
{{--        height:13px;--}}

{{--    }--}}
{{--    button{--}}
{{--        width:30px;--}}
{{--        height:23px;--}}
{{--        border: 1px solid #ccc;--}}
{{--    }--}}
{{--    .btn-minus{--}}
{{--        border-radius: 10px 0px 0px 10px;--}}
{{--    }--}}
{{--    .btn-plus{--}}
{{--        border-radius: 0px 10px 10px 0px;--}}
{{--    }--}}
{{--    .xoa {--}}
{{--        cursor: pointer;--}}
{{--        color: purple;--}}
{{--        text-align: center;--}}
{{--        font-size: 12px;--}}
{{--    }--}}

{{--    /* Desktop View */--}}
{{--    @media (min-width: 1024px) {--}}
{{--        .hinh_anh img {--}}
{{--            width: 60px;--}}
{{--        }--}}
{{--        .soluong input {--}}
{{--            width: 40px;--}}
{{--        }--}}
{{--    }--}}

{{--    @media (min-width: 1440px) {--}}
{{--        .hinh_anh img {--}}
{{--            width: 70px;--}}
{{--        }--}}
{{--        .soluong input {--}}
{{--            width: 50px;--}}
{{--        }--}}
{{--    }--}}
{{--    .ten {--}}
{{--        word-wrap: break-word;--}}
{{--        max-width: 180px;--}}
{{--        text-align: left;--}}
{{--    }--}}


{{--    /* thanh thanh toán */--}}
{{--    .summary-bar {--}}
{{--        background-color: white;--}}
{{--        margin-top: 30px;--}}
{{--        display: flex;--}}
{{--        padding: 15px;--}}
{{--        font-size: 18px;--}}
{{--        border: 1px solid gray;--}}
{{--        border-style: dashed;--}}
{{--        justify-content: center;--}}
{{--        text-align: center;--}}
{{--        width: 100%;--}}
{{--        max-width: 850px;--}}
{{--        margin-left: auto;--}}
{{--        margin-right: auto;--}}
{{--    }--}}

{{--    @media screen and (max-width: 992px) {--}}
{{--        .summary-bar {--}}
{{--            width: 95%;--}}
{{--        }--}}
{{--    }--}}

{{--    @media screen and (max-width: 768px) {--}}
{{--        .summary-bar {--}}
{{--            flex-direction: column;--}}
{{--            align-items: center;--}}
{{--            text-align: left;--}}
{{--            padding: 10px;--}}
{{--        }--}}
{{--    }--}}

{{--    .summary-bar .total-amount{--}}
{{--        margin-left: 250px;--}}
{{--        color:black;--}}
{{--        margin-top:10px;--}}

{{--    }--}}
{{--    .summary-bar button{--}}
{{--        background-color: unset;--}}
{{--        border:1px solid purple;--}}
{{--        background-color: purple;--}}
{{--        border-radius: 10px;--}}
{{--        width:100px;--}}
{{--        height:35px;--}}
{{--        margin-left: 200px;--}}
{{--        color:white;--}}
{{--        font-size: 18px;--}}
{{--        position:relative;--}}
{{--    }--}}
{{--    .summary-bar button:hover{--}}
{{--        background-color:blueviolet;--}}
{{--    }--}}


{{--    /* related product */--}}

{{--    .san-pham-lien-quan {--}}
{{--        background-color: #f9f9f9;--}}
{{--        margin-left:20px;--}}
{{--        margin-top:50px;--}}
{{--        text-align: center;--}}
{{--        width:1400px;--}}
{{--        height:300px;--}}
{{--    }--}}
{{--    .san-pham-lien-quan h2{--}}
{{--        text-align: left;--}}
{{--        margin-left:50px;--}}
{{--        font-size:23px;--}}
{{--    }--}}
{{--    .danh-sach-san-pham {--}}
{{--        margin-top:20px;--}}
{{--        display: flex;--}}
{{--        flex-wrap:nowrap;--}}
{{--        overflow-x: auto;--}}
{{--        scroll-snap-type: x mandatory;--}}
{{--        justify-content: space-around;--}}
{{--        max-width: 1300px;--}}
{{--        margin: 0 auto;--}}
{{--        height:250px;--}}
{{--    }--}}

{{--    .san-pham {--}}
{{--        width: 150px;--}}
{{--        margin-bottom: 20px;--}}
{{--        background-color: rgb(255, 255, 255);--}}
{{--        padding: 10px;--}}
{{--        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);--}}
{{--        flex: 0 0 auto;--}}
{{--        scroll-snap-align: start;--}}
{{--        margin-right: 10px;--}}
{{--    }--}}

{{--    .san-pham img {--}}
{{--        height: 50%;--}}
{{--        object-fit: cover;--}}
{{--    }--}}

{{--    .san-pham h3 {--}}
{{--        margin-top: 10px;--}}
{{--        font-weight: bold;--}}
{{--        font-size: 12px;--}}
{{--        display: -webkit-box;--}}
{{--        -webkit-line-clamp: 2;--}}
{{--        -webkit-box-orient: vertical;--}}
{{--        overflow: hidden;--}}
{{--        text-overflow: ellipsis;--}}
{{--        white-space: normal;--}}
{{--        line-height: 14px;--}}
{{--    }--}}

{{--    .san-pham p {--}}
{{--        margin-top: 5px;--}}
{{--        font-size: 10px;--}}
{{--        color:blue;--}}
{{--        display: -webkit-box;--}}
{{--        -webkit-line-clamp: 2;--}}
{{--        -webkit-box-orient: vertical;--}}
{{--        overflow: hidden;--}}
{{--    }--}}

{{--    .san-pham .gia {--}}
{{--        display: block;--}}
{{--        margin-top: -10px;--}}
{{--        font-size: 13px;--}}
{{--        color: red;--}}
{{--    }--}}

{{--    ::-webkit-scrollbar {--}}
{{--        display: none;--}}
{{--    }--}}

{{--    @media screen and (max-width: 1199px) {--}}
{{--        .san-pham-lien-quan {--}}
{{--            width: 100%;--}}
{{--            margin-left: 0;--}}
{{--            margin-right: 0;--}}
{{--            padding: 10px;--}}
{{--        }--}}
{{--        .san-pham-lien-quan h2{--}}
{{--            text-align: left;--}}
{{--            margin-left:50px;--}}
{{--        }--}}
{{--        .danh-sach-san-pham {--}}
{{--            max-width: 100%;--}}
{{--            padding: 0 10px;--}}
{{--        }--}}

{{--        .san-pham img {--}}
{{--            width: 50%;--}}
{{--        }--}}

{{--        .san-pham h3 {--}}
{{--            font-size: 12px;--}}
{{--        }--}}

{{--        .san-pham p {--}}
{{--            font-size: 10px;--}}
{{--        }--}}

{{--        .san-pham .gia {--}}
{{--            font-size: 13px;--}}
{{--        }--}}
{{--    }--}}

{{--    /*===============  FOOTER ===============*/--}}
{{--    .footer{--}}
{{--        background-color: var(--second-color);--}}
{{--        color: var(--dark-color);--}}
{{--        margin-top:30px;--}}
{{--        a:hover{--}}
{{--            color: var(--main-color-light);--}}
{{--        }--}}
{{--    }--}}

{{--    .footer_brand{--}}
{{--        font-family: var(--second-font);--}}
{{--        color: var(--main-color);--}}
{{--    }--}}

{{--    .footer_icons a{--}}
{{--        color: var(--dark-color);--}}
{{--    }--}}

{{--    .contact a, .links a{--}}
{{--        color: var(--dark-color);--}}
{{--    }--}}

{{--    .contact h5, .links h5{--}}
{{--        color: var(--main-color);--}}
{{--    }--}}

{{--    .copyright{--}}
{{--        text-align: center;--}}
{{--        background-color: rgba(0, 0, 0, 0.2);--}}
{{--    }--}}

{{--    /*=============== SCROLL UP ===============*/--}}
{{--    .scrollup{--}}
{{--        position: fixed;--}}
{{--        background: var(--main-color-light);--}}
{{--        right: 1rem;--}}
{{--        bottom: -20%;--}}
{{--        display: inline-flex;--}}
{{--        padding: .3rem;--}}
{{--        border-radius: .25rem;--}}
{{--        z-index: var(--z-tooltip);--}}
{{--        opacity: .8;--}}
{{--        transition: .4s;--}}
{{--    }--}}

{{--    .scrollup__icon{--}}
{{--        font-size: 1.25rem;--}}
{{--        color: var(--white-color);--}}
{{--    }--}}

{{--    .scrollup:hover{--}}
{{--        background: var(--main-color-lighter);--}}
{{--        opacity: 1;--}}
{{--    }--}}

{{--    /* Show Scroll Up*/--}}
{{--    .show-scroll{--}}
{{--        bottom: 3rem;--}}
{{--    }--}}
{{--</style>--}}







