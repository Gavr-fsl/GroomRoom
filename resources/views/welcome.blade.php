<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/resources/css/app.css">
    <script src="/resources/js/app.js" defer></script>
</head>
<body>
<div class="navbar">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link">Главная</a>
            </li>
            @guest()
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Регистрация</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Авторизация</a>
            </li>
            @endguest
            @auth()
                @if(Auth::user()->role == 0)
                    <li class="nav-item">
                        <a href="{{ route('application.create') }}" class="nav-link">Заявки</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('account') }}" class="nav-link">Акаунт</a>
                    </li>
                @endif
                @if(Auth::user()->role == 1)
                    <li class="nav-item">
                        <a href="{{ route('admin') }}" class="nav-link">Акаунт</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories') }}" class="nav-link">Категории</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">Выйти</a>
                </li>
            @endauth

        </ul>
    </div>
</div>
<div class="content">
    @yield('content')
</div>
</body>
</html>
