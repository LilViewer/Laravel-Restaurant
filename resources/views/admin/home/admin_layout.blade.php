<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--        <script defer src="js/bootstrap.bundle.min.js"></script>--}}
    {{--        <script defer src="/assets/js/jquery.min.js"></script>--}}
    <title>@yield('title')</title>
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
<div class="container-fluid">
    <div class="row">
        <header class="col-md-2 mt-4 navbar-expand-md">
            <ul class="bg-primary p-3 flex-column navbar-nav">
                <li class="nav-item active">
                    <a class='nav-link text-light' href="{{route('Adminindex')}}">
                        Админ
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link text-light' href="{{route('categories.index')}}">
                        Все категории
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link text-light' href="{{route('categories.create')}}">
                        Добавить категорию
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link text-light' href="{{route('products.index')}}">
                        Все товары
                    </a>
                </li>
                <li class="nav-item">
                    <a class='nav-link text-light' href="{{route('products.create')}}">
                        Добавить товар
                    </a>
                </li>
            </ul>
        </header>
        <div class="col-md-10 mt-5 mb-5">
            <h5>Панель админа</h5>
            <hr>
            <div class="container">
                @yield('AdminContent')
            </div>
        </div>
    </div>
</div>
</body>
<script defer src="js/bootstrap.bundle.min.js"></script>
<script defer src="/assets/js/jquery.min.js"></script>
</html>
