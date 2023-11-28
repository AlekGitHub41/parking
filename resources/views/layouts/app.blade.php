<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Стоянка автомобилей</title>
    <meta charset="utf-8">
    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-sm navbar-dark rounded-bottom" style="background-color: rgb(13,17,23);">
        <div class="container ">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <a class="navbar-brand" aria-current="page" href="#">Главная</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item  border-end border-secondary border-start">
                        <a class="nav-link active" href="{{route("index")}}" tabindex="-1" aria-disabled="true">Все
                            клиенты и авто</a>
                    </li>
                    <li class="nav-item border-end border-secondary">
                        <a class="nav-link active" aria-current="page" href="{{ route("client.create") }}">Создать
                            клиента</a>
                    </li>
                    <li class="nav-item border-end border-secondary">
                        <a class="nav-link active" aria-current="page" href="{{route("automobile.create")}}">Создать
                            автомобиль клиента</a>
                    </li>
                    <li class="nav-item border-end border-secondary">
                        <a class="nav-link active" aria-current="page" href="{{route('all-client.index')}}">Клиенты</a>
                    </li>
                    <li class="nav-item border-end border-secondary">
                        <a class="nav-link active" aria-current="page" href="{{route("all-automobile.index")}}">Автомобили на стоянке</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield("content")
</div>
</body>
</html>
