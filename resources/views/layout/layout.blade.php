<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--=============== BOOTSTRAP ===============-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <!--=============== CSS ===============--> 
    <style>
          /*=============== GOOGLE FONTS ===============*/
      @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=League+Spartan:wght@300&display=swap');
  
      :root{
        /*========== Colors ==========*/
  
        --main-color: hsl(302, 60%, 33%);
        --main-color-alt: hsl(301, 59%, 23%);
        --main-color-dark: #462e74;
        --main-color-light: rgba(204, 148, 213, 1);
        --main-color-lighter: hsl(314, 60%, 62%);
  
        --second-color: rgba(247, 233, 161, 1);
        
        --third-color: rgba(9, 177, 171, 1);
  
        --fourth-color:hsl(30, 100%, 82%);
        --fourth-color-dark:hsl(14, 91%, 50%);
        --fourth-color-dark-alt:hsl(14, 91%, 45%);
  
        --white-color: hsl(0, 0%, 100%);
        --dark-color: hsl(0, 8%, 28%);
  
        --light-bg:#eee;
        --black:#2c3e50;
        --border:.1rem solid rgba(0,0,0,.2);
  
        /*========== Font and typography ==========*/
        --body-font: "League Spartan", sans-serif;
        --second-font: "Fredoka", sans-serif;
  
        /*========== z index ==========*/
        --z-tooltip: 10;
        --z-fixed: 100;
      }
  
  
      *{
        margin:0; padding:0;
        box-sizing: border-box;
        outline: none; 
        border:none;
        text-decoration: none;
      }
  
      body{
        font-family: var(--body-font);
      }
  
      a{
        text-decoration: none;
      }
  
      ul, li{
        text-decoration: none;
        list-style-type: none;
        padding: 0;
        margin: 0;
      }
  
      img{
        max-width: 100%;
        height: auto;
        object-fit: cover;
      }
  
      .button:hover{
        background-color: var(--dark-color);
      }
  
      /*===============  HEADER ===============*/
      header{
        background-color: var(--main-color);
        position: fixed;
        z-index: var(--z-fixed);
        box-shadow: 0 2px 16px hsla(0, 0%, 0%, .15);
        color: var(--white-color);
      }
  
      .nav_brand{
        color: var(--white-color);
        font-family: var(--second-font);
      }
  
      .search_box{
        position: relative;
        background-color: var(--light-bg);
        height: fit-content;
        border-radius: 1rem;
        form
        {
            display: flex;
        }
        input{
            width: 100%;
            background: none;
            font-family: var(--body-font);
            color: var(--main-color);
        }
        .search-btn{
            cursor: pointer;
            color:var(--black);
        }
        .search-btn :hover{
            color:var(--main-color);
        }
        .search-recommend{
            position: absolute;
            bottom: -100%;
            color: black;
        }
      }
  
      .search_box_hide{
        border-radius: 1rem;
        background-color: var(--light-bg);
        position: absolute;
        right: 2rem;
        top: 110%; 
        text-align: center;
        transform-origin: top right;
        transform: scale(0);
        transition: .2s linear;
        form
        {
            display: flex;
        }
        input{
            width: 100%;
            background: none;
            font-family: var(--body-font);
            color: var(--main-color);
        }
        .search-btn{
            cursor: pointer;
            color:var(--black);
        }
        .search-btn :hover{
            color:var(--main-color);
        }
      }
  
      .header .nav .active{
        transform: scale(1);
      }
  
      .header_icons{
        display: flex;
        flex-direction: row;
        i{
            color: var(--white-color);     
            border-radius: 50%;
            padding: .3rem;
        }
        i:hover{
            background-color: var(--main-color-light);
        }
      }
  
      /*--=============== CART DROPDOWN ===============-->*/
  
      .book_title{
        display: block;
      }
  
      .book_title a{
        color: var(--main-color);
        font-weight: bold;
        word-break: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        margin-bottom: .3rem;
        line-height: 1.4rem;
      }
  
      .book_title:hover a{
        color: var(--main-color-light);
      }
  
      .book_author{
        word-break: break-word;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        min-height: 1.8rem;
        max-height: 1.8rem;
        margin-bottom: .3rem;
      }
  
      .book_price{
        color: var(--main-color);
        font-weight: bold;
      }
  
      .dropdown {
        position: absolute;
        background-color: var(--white-color);
        border-radius: 1rem;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
        min-width: 250px;
        max-width: 280px;
        overflow: hidden;
        
        right: 2rem;
        top: 110%; 
        
        transform-origin: top right;
        transform: scale(0);
        transition: .2s linear;
      }
      .cart-item {
        background-color: var(--light-bg);
        margin-top: .5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        height: 70px;
        column-gap: .3rem;
        color: var(--dark-color);
      }
  
  
      .cart-item .book_title a{
        color: var(--main-color-dark);
        min-width: 100%;
        max-width: 100%;
        max-height: none;
  
        font-size: .9rem;
        font-weight: bold;   
        min-height: 2.2rem;
      }
  
      .cart-item .book_price{
        font-size: .9rem;
        font-weight: bold;   
        color: var(--main-color);
        font-weight: bold;
        overflow-wrap: break-word;
      }
  
      .cart_img{
        height: 70px;
        max-width: 25%;
        display: flex;
        justify-content: center;
        overflow: hidden;
      }
  
      .cart_img img{
        object-fit: cover;
        min-height: 100%;
        min-width: 100%;
      }
  
      .dropdown.show {
        display: block; 
        transform: scale(1);
      }
      .xoa {
        margin-right: 1rem;
        cursor: pointer;
        color: gray;
        text-align: center;
      }
      .xoa:hover {
        color: var(--main-color);
      }
  
      .summary button{
        background-color: unset;
        border:1px solid var(--main-color-light);
        background-color: var(--main-color);
        border-radius: 10px;
        width:90px;
        height:25px;
        margin-left: 150px;
        color:white;
      }
      .summary p {
        color:black;
        margin-bottom: 0;
      }
      .summary button:hover{
        background-color:var(--main-color-alt);
      }
      .cart-item {
        transition: transform 0.5s ease, opacity 0.5s ease; 
      }
      .cart-item.fade-out {
        transform: translateX(100%);
        opacity: 0; 
      }
  
      /*=================MAIN ================*/
      .main{
        overflow: hidden;
        background-color: var(--main-color);
      }
  
      /*===============  FOOTER ===================*/
      .footer{
        background-color: var(--second-color);
        color: var(--dark-color);
        padding: 0;
        a:hover{
            color: var(--main-color-light);
        }
      }
  
      .footer_brand{
        font-family: var(--second-font);
        color: var(--main-color);
      }
  
      .footer_icons a{
        color: var(--dark-color);
      }
  
      .contact a, .links a{
        color: var(--dark-color);
      }
  
      .contact h5, .links h5{
        color: var(--main-color);
      }
  
      .copyright{
        text-align: center;
        background-color: rgba(0, 0, 0, 0.2);
      }
  
      /*=============== SCROLL UP ===============*/
      .scrollup{
        position: fixed;
        background: var(--main-color-light);
        right: 1rem;
        bottom: -20%;
        display: inline-flex;
        padding: .3rem;
        border-radius: .25rem;
        z-index: var(--z-tooltip);
        opacity: .8;
        transition: .4s;
      }
      
      .scrollup__icon{
        font-size: 1.25rem;
        color: var(--white-color);
      }
      
      .scrollup:hover{
        background: var(--main-color-lighter);
        opacity: 1;
      }
      
      /* Show Scroll Up*/
      .show-scroll{
        bottom: 3rem;
      }
      </style>
  </head>

<style>
    <style>
        /*=============== GOOGLE FONTS ===============*/
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=League+Spartan:wght@300&display=swap');

    :root{
      /*========== Colors ==========*/

      --main-color: hsl(302, 60%, 33%);
      --main-color-alt: hsl(301, 59%, 23%);
      --main-color-dark: #462e74;
      --main-color-light: rgba(204, 148, 213, 1);
      --main-color-lighter: hsl(314, 60%, 62%);

      --second-color: rgba(247, 233, 161, 1);
      
      --third-color: rgba(9, 177, 171, 1);

      --fourth-color:hsl(30, 100%, 82%);
      --fourth-color-dark:hsl(14, 91%, 50%);
      --fourth-color-dark-alt:hsl(14, 91%, 45%);

      --white-color: hsl(0, 0%, 100%);
      --dark-color: hsl(0, 8%, 28%);

      --light-bg:#eee;
      --black:#2c3e50;
      --border:.1rem solid rgba(0,0,0,.2);

      /*========== Font and typography ==========*/
      --body-font: "League Spartan", sans-serif;
      --second-font: "Fredoka", sans-serif;

      /*========== z index ==========*/
      --z-tooltip: 10;
      --z-fixed: 100;
    }


    *{
      margin:0; padding:0;
      box-sizing: border-box;
      outline: none; 
      border:none;
      text-decoration: none;
    }

    body{
      font-family: var(--body-font);
    }

    a{
      text-decoration: none;
    }

    ul, li{
      text-decoration: none;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    img{
      max-width: 100%;
      height: auto;
      object-fit: cover;
    }

    .button:hover{
      background-color: var(--dark-color);
    }

    /*===============  HEADER ===============*/
    header{
      background-color: var(--main-color);
      position: fixed;
      z-index: var(--z-fixed);
      box-shadow: 0 2px 16px hsla(0, 0%, 0%, .15);
      color: var(--white-color);
    }

    .nav_brand{
      color: var(--white-color);
      font-family: var(--second-font);
    }

    .search_box{
      position: relative;
      background-color: var(--light-bg);
      height: fit-content;
      border-radius: 1rem;
      form
      {
          display: flex;
      }
      input{
          width: 100%;
          background: none;
          font-family: var(--body-font);
          color: var(--main-color);
      }
      .search-btn{
          cursor: pointer;
          color:var(--black);
      }
      .search-btn :hover{
          color:var(--main-color);
      }
      .search-recommend{
          position: absolute;
          bottom: -100%;
          color: black;
      }
    }

    .search_box_hide{
      border-radius: 1rem;
      background-color: var(--light-bg);
      position: absolute;
      right: 2rem;
      top: 110%; 
      text-align: center;
      transform-origin: top right;
      transform: scale(0);
      transition: .2s linear;
      form
      {
          display: flex;
      }
      input{
          width: 100%;
          background: none;
          font-family: var(--body-font);
          color: var(--main-color);
      }
      .search-btn{
          cursor: pointer;
          color:var(--black);
      }
      .search-btn :hover{
          color:var(--main-color);
      }
    }

    .header .nav .active{
      transform: scale(1);
    }

    .header_icons{
      display: flex;
      flex-direction: row;
      i{
          color: var(--white-color);     
          border-radius: 50%;
          padding: .3rem;
      }
      i:hover{
          background-color: var(--main-color-light);
      }
    }

    /*--=============== CART DROPDOWN ===============-->*/

    .book_title{
      display: block;
    }

    .book_title a{
      color: var(--main-color);
      font-weight: bold;
      word-break: break-word;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      margin-bottom: .3rem;
      line-height: 1.4rem;
    }

    .book_title:hover a{
      color: var(--main-color-light);
    }

    .book_author{
      word-break: break-word;
      overflow: hidden;
      text-overflow: ellipsis;
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      min-height: 1.8rem;
      max-height: 1.8rem;
      margin-bottom: .3rem;
    }

    .book_price{
      color: var(--main-color);
      font-weight: bold;
    }

    .dropdown {
      position: absolute;
      background-color: var(--white-color);
      border-radius: 1rem;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      min-width: 250px;
      max-width: 280px;
      overflow: hidden;
      
      right: 2rem;
      top: 110%; 
      
      transform-origin: top right;
      transform: scale(0);
      transition: .2s linear;
    }
    .cart-item {
      background-color: var(--light-bg);
      margin-top: .5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      height: 70px;
      column-gap: .3rem;
      color: var(--dark-color);
    }


    .cart-item .book_title a{
      color: var(--main-color-dark);
      min-width: 100%;
      max-width: 100%;
      max-height: none;

      font-size: .9rem;
      font-weight: bold;   
      min-height: 2.2rem;
    }

    .cart-item .book_price{
      font-size: .9rem;
      font-weight: bold;   
      color: var(--main-color);
      font-weight: bold;
      overflow-wrap: break-word;
    }

    .cart_img{
      height: 70px;
      max-width: 25%;
      display: flex;
      justify-content: center;
      overflow: hidden;
    }

    .cart_img img{
      object-fit: cover;
      min-height: 100%;
      min-width: 100%;
    }

    .dropdown.show {
      display: block; 
      transform: scale(1);
    }
    .xoa {
      margin-right: 1rem;
      cursor: pointer;
      color: gray;
      text-align: center;
    }
    .xoa:hover {
      color: var(--main-color);
    }

    .summary button{
      background-color: unset;
      border:1px solid var(--main-color-light);
      background-color: var(--main-color);
      border-radius: 10px;
      width:90px;
      height:25px;
      margin-left: 150px;
      color:white;
    }
    .summary p {
      color:black;
      margin-bottom: 0;
    }
    .summary button:hover{
      background-color:var(--main-color-alt);
    }
    .cart-item {
      transition: transform 0.5s ease, opacity 0.5s ease; 
    }
    .cart-item.fade-out {
      transform: translateX(100%);
      opacity: 0; 
    }

    /*=================MAIN ================*/
    .main{
      overflow: hidden;
      background-color: var(--main-color);
    }

    /*===============  FOOTER ===================*/
    .footer{
      background-color: var(--second-color);
      color: var(--dark-color);
      padding: 0;
      a:hover{
          color: var(--main-color-light);
      }
    }

    .footer_brand{
      font-family: var(--second-font);
      color: var(--main-color);
    }

    .footer_icons a{
      color: var(--dark-color);
    }

    .contact a, .links a{
      color: var(--dark-color);
    }

    .contact h5, .links h5{
      color: var(--main-color);
    }

    .copyright{
      text-align: center;
      background-color: rgba(0, 0, 0, 0.2);
    }

    /*=============== SCROLL UP ===============*/
    .scrollup{
      position: fixed;
      background: var(--main-color-light);
      right: 1rem;
      bottom: -20%;
      display: inline-flex;
      padding: .3rem;
      border-radius: .25rem;
      z-index: var(--z-tooltip);
      opacity: .8;
      transition: .4s;
    }
    
    .scrollup__icon{
      font-size: 1.25rem;
      color: var(--white-color);
    }
    
    .scrollup:hover{
      background: var(--main-color-lighter);
      opacity: 1;
    }
    
    /* Show Scroll Up*/
    .show-scroll{
      bottom: 3rem;
    }
    </style>
</style>

<body>
    <header class="header container-fluid">
        <ul class="nav navbar container">
          <li>
            <a href="#" class="nav_brand">
              <h1 class = "display-5">Verbify</h1>
            </a>
          </li>
          
          <li class = "col-5 d-md-inline d-none search_box">
            <form action = "#" method="GET" class="py-1 px-3 mb-1">
              <input name="search" id = "searchbox" placeholder="Snow White and the Seven Dwarfs..." maxlength="100">
              <button type="submit" class = "search-btn fs-5">
                <i class = "bx bx-search-alt"></i>
              </button>
            </form>   
          </li>
    
          <li class="search_box_hide col-8 col-md-4 shadow">
            <form action = "#" method="post" class="py-1 px-3">
              <input name="search" class = "fs-7" placeholder="Search..." maxlength="100">
              <button type="submit" class = "search-btn fs-5">
                <i class = "bx bx-search-alt"></i>
              </button>
            </form>   
          </li>
    
          <li class="header_icons col-md-auto text-end gx-2"> 
            <div id="search-btn" class = "p-1 d-md-none d-inline">
              <i class = "bx bx-search-alt fs-4"></i>
            </div>
            <div id="cart-btn" class = "p-1">
              <i class = "bx bx-cart-alt fs-4"></i>
            </div>
            <div id="user-btn" class = "p-1">
              <a href="#"><i class = "bx bx-user-circle fs-4"></i></a>
            </div>
          </li>
    
          <li class="dropdown p-2 px-md-3 shadow" id="dropdown">
            <div class="cart-item p-1">
              <div class="cart_img col-3">
                <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
              </div>
              <span class="book_title col-5"><a href="#">Book's Name</a></span>
              <span class="book_price col-3">25.000đ</span>  
              <button id = "delete-btn" class="xoa col-1">
                <i class='bx bxs-trash-alt'></i>
              </button>
            </div>
            <div class="cart-item p-1">
              <div class="cart_img col-3">
                <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
              </div>
              <span class="book_title col-5"><a href="#">Book's Name Lorem ipsum dolor sit amet</a></span>
              <span class="book_price col-3">1.352.000đ</span>  
              <button id = "delete-btn" class="xoa col-1">
                <i class='bx bxs-trash-alt'></i>
              </button>
            </div>
            <div class="cart-item p-1">
              <div class="cart_img col-3">
                <a href="#"><img src ="https://i.pinimg.com/564x/90/d0/39/90d03955f644a8b67e52eaf9cf1f2891.jpg" class="img-fluid" alt="img"></a>
              </div>
              <span class="book_title col-5"><a href="#">Book's Name Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, atque!</a></span>
              <span class="book_price col-3">114.000đ</span>  
              <button id = "delete-btn" class="xoa col-1">
                <i class='bx bxs-trash-alt'></i>
              </button>
            </div>
    
            <div class="summary mt-2">
              <p> 3 <span>total products</span></p>
              <button class="btn-order" onclick="placeOrder()">Go to cart</button>
            </div>
          </li>
    
        </ul>
      </header>
    
      <!--==============MAIN==================-->
      <main class="main pt-5 w-100 justify-content-center">  
        <div class="content bg-gray">
            <div class="">
                <div class="d-flex p-5">
                    <div class="w-30  p-3">
                        <div class="d-flex">
                            <div class="me-3">
                                <img src="{{ !empty($user->AVATAR) ? Storage::url($user->AVATAR) : 'https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745' }}"
                                    alt="avatar" class="img-thumbnail" style="width: 75px;height:75px">
                            </div>
                            <div class="me-3">
                                <h3 class="">Account Name</h3>
                                <div class="fw-bold fs-4">{{ $user->LAST_NAME . ' ' . $user->FIRST_NAME }}</div>
                            </div>
                        </div>
                        <div class="mt-5 ms-3">
                            <div class="mb-3">
                                <a id="profile-link" href="/profile" class="text-decoration-none fs-4 text-purple-active">
                                    <i class="fa-regular fa-user fs-4 pe-3"></i>My Account
                                </a>
                            </div>
                            <div class="mb-3">
                                <a id="order-link" href="/profile/myorder" class="text-decoration-none fs-4 text-purple-deactive">
                                    <i class="fa-regular fa-user fs-4 pe-3"></i>Order management
                                </a>
                            </div>
                            
                            <script>
                                function updateActiveLink() {
                                    const currentPath = window.location.pathname;
                            
                                    const profileLink = document.getElementById('profile-link');
                                    const orderLink = document.getElementById('order-link');
                            
                                    if (currentPath === '/profile') {
                                        profileLink.classList.add('text-purple-active');
                                        profileLink.classList.remove('text-purple-deactive');
                            
                                        orderLink.classList.add('text-purple-deactive');
                                        orderLink.classList.remove('text-purple-active');
                                    } else if (currentPath === '/profile/myorder') {
                                        orderLink.classList.add('text-purple-active');
                                        orderLink.classList.remove('text-purple-deactive');
                            
                                        profileLink.classList.add('text-purple-deactive');
                                        profileLink.classList.remove('text-purple-active');
                                    }
                                }
                            
                                window.onload = updateActiveLink;
                            </script>
                            
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
      </main>
    
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
                  <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+C%C3%B4ng+ngh%E1%BB%87+Th%C3%B4ng+tin+-+%C4%90HQG+TP.HCM/@10.8702229,106.8000212,17z/data=!4m10!1m2!2m1!1suit!3m6!1s0x317527587e9ad5bf:0xafa66f9c8be3c91!8m2!3d10.8700089!4d106.8030541!15sCgN1aXSSAQp1bml2ZXJzaXR54AEA!16s%2Fm%2F02qqlmm?hl=vi-VN&entry=ttu">
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    document.getElementById('avatarUpload').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatarPreview').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!--=============== MAIN JS ===============-->
  <script>
    /*=============== SHOW SEARCH ===============*/ 
    let dropdown = document.getElementById('dropdown');
    let search = document.querySelector('.header .nav .search_box_hide');
    document.querySelector('#search-btn').onclick = () =>{
      search.classList.toggle('active');
      dropdown.classList.remmove('show');
    }

    /*=============== SHOW CART ===============*/
      document.addEventListener('DOMContentLoaded', function () {
          const cartIcon = document.getElementById('cart-btn');
          const dropdown = document.getElementById('dropdown');
          const summary = document.querySelector('.summary p');

          const toggleDropdown = (show) => {
            dropdown.classList.toggle('show', show);
            search.classList.remove('active');
          };

          cartIcon.addEventListener('mouseenter', () => toggleDropdown(true));
          cartIcon.addEventListener('mouseleave', () => toggleDropdown(false));
          dropdown.addEventListener('mouseenter', () => toggleDropdown(true));
          dropdown.addEventListener('mouseleave', () => toggleDropdown(false));

          const updateTotalProducts = () => {
            const totalProducts = document.querySelectorAll('.cart-item').length;
            const productText = totalProducts >= 2 ? 'products' : 'product';
            summary.innerHTML = `Total ${totalProducts} ${productText}`;
          };

          document.querySelectorAll('.bxs-trash-alt').forEach(button => {
            button.addEventListener('click', (event) => {
                  const cartItem = event.target.closest('.cart-item');
                  if (cartItem) {
                      cartItem.classList.add('fade-out');
                      setTimeout(() => {
                        cartItem.remove();
                        updateTotalProducts();
                      }, 300);
                  }
            });
          });

          updateTotalProducts();
      });

    /*=============== SHOW SCROLL UP ===============*/ 
    let body = document.body;
    function scrollUp(){
      const scrollUp = document.getElementById('scroll-up');
      if(this.scrollY >= 460) scrollUp.classList.add('show-scroll'); 
      else scrollUp.classList.remove('show-scroll')
    }
    window.addEventListener('scroll', scrollUp);
  </script>
  
  <!--=============== BOOSTRAP ===============--> 
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
