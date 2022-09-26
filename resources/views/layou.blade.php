<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--        <script defer src="js/bootstrap.bundle.min.js"></script>--}}
    {{--        <script defer src="/assets/js/jquery.min.js"></script>--}}
    <title>@yield('title')</title>
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <script defer src="/assets/js/jquery.min.js"></script>
    <style>
        body{
            overflow-x: hidden;
        }
        *{
            word-break: break-word;
            box-sizing: border-box;
        }
    </style>
</head>
<body style="background: white; padding: 0;margin: 0">
<header class="row header d-flex mt-2 " style="mix-height: 100px; margin-bottom: 100px">
    <a href="/" class="col-lg-2 col-md-12 justify-content-center text-center">
        <img
                src="/images/loh.png"
                style="height: 100px;background-size: cover"
        >
    </a>
    <div class="text-center justify-content-around col-lg-7 col-md-12 d-flex mt-4 ">
        <div class="col-lg-2 col-md-12">
            <a style="font-size: 28px" class="navbar-brand text-black" href="/about">
                О нас
            </a>
        </div>
        <div class="col-lg-2 col-md-12">
            <a style="font-size: 28px" class="navbar-brand text-black" href="/katalog">
                Каталог
            </a>
        </div>
        <div class="col-lg-3 col-md-12">
            <a style="font-size: 28px" class="navbar-brand text-black" href="/kontak">
                Где нас найти?
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-12  d-flex mt-4 justify-content-center">
        @auth()
            <div class="justify-content-center text-center ">
                <a class="navbar-brand btn btn-secondary" href="{{route('basket.index')}}">
                    Корзина {{session('countOrder')==0?0:session('countOrder')}}
                </a>
            </div>
            <div class="justify-content-center text-center ">
                <a class="navbar-brand" href="/profil">{{Auth::user()->login}} </a>
            </div>
            <div class="justify-content-center text-center ">
                <a class="navbar-brand btn btn-secondary" href="{{route('logout')}}">Выйти </a>
            </div>
        @endauth
        @guest()
            <div class="justify-content-center text-center ">
                <a class="navbar-brand btn btn-secondary" href="/login">Войти </a>
            </div>
            <div class="justify-content-center text-center ">
                <a class="navbar-brand btn btn-secondary" href="/register">Регистрация </a>
            </div>
        @endguest
    </div>
</header>
<div style="min-height: 42vh" >
    @yield('content')
</div>
<footer class="row " style="margin-top: 100px">
    <hr style="color: black">
    <div class="col-lg-2 col-md-12 justify-content-center text-center">
        <a href="/" class="justify-content-center text-center">
            <img
                    src="/images/loh.png"
                    style="height: 100px;background-size: cover"
            >
        </a>
    </div>
    <div class="text-center justify-content-center col-lg-9 col-md-12 d-flex mt-4">
        <div class="col-lg-3 col-md-12">
            <a style="font-size: 28px" class="navbar-brand text-black" href="/about">
                О нас
            </a>
        </div>
        <div class="col-lg-3 col-md-12">
            <a style="font-size: 28px" class="navbar-brand text-black" href="/catalog">
                Каталог
            </a>
        </div>
        <div class="col-lg-3 col-md-12">
                    <span style="font-size: 28px" class="navbar-brand text-black" href="/kontak">
                        телефон: +7 908 123-45-67
                    </span>
        </div>
    </div>
</footer>
</body>
</html>
