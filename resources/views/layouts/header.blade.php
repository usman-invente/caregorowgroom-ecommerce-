<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/aos.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link href="{{asset('public/assets/css/swiper.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Care Grow Groom</title>
    <style>
      .swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
      }

      .swiper-slide {
        background-size: cover;
        background-position: center;
      }

      .mySwiper2 {
        height: 80%;
        width: 100%;
      }

      .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
      }

      .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
      }

      .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
</style>
</head>

<body>
    <!--header-->
    <div class="header-main-wraper">

        <!--topbar-->
        <div class="topbar-wraper"> Summer sale discount off 50%! <a href="#">Shop Now</a> </div>
        <!--topbar-->

        <!--header-->
        <div class="container">

            <!--logo, search, cart-->
            <div class="top-logo-search-cart-wrp">
                <div class="header-wraper">
                    <div class="row">

                        <!--logo-->
                        <div class="col-md-3">
                            <div class="logo-wraper"> <a href="{{url('/')}}"> <img src="{{asset('public/assets/images/logo.png')}}" alt=""> </a> </div>
                        </div>
                        <!--logo-->

                        <!--search-->
                        <div class="col-md-7">
                            <div class="search-header-wraper">
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="I’m shopping for....">
                                        <button> Search </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--search-->

                        <!--cart buttons-->
                        <div class="col-md-2">
                            <div class="cart-button-wraper">
                                @guest
                                <a href="#">
                                    <img src="{{asset('public/assets/images/user.jpg')}}" alt="user"> </a>
                                @else
                                <a href="{{route('home')}}">  <img src="{{asset('public/assets/images/user.jpg')}}" alt="user"> </a> Dashboard </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                @endguest
                                <a href="#"> <img src="{{asset('public/assets/images/heart.jpg')}}" alt="heart"> <span> 2 </span></a> <a href="{{route('cart')}}"> <img src="{{asset('public/assets/images/cart.jpg')}}" alt="cart"> <span class="cart-badge">
                                        @if(Session::get('cart'))
                                        {{count(Session::get('cart'))}}
                                        @else
                                        0
                                        @endif
                                    </span></a>
                            </div>
                        </div>

                        <!--cart buttons-->

                    </div>
                </div>
            </div>
            <!--logo, search, cart-->