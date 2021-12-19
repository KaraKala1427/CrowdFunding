<nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
    <div class="container">

        <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Главная</a></li>
                <li class="nav-item"><a class="nav-link" href="#categories">Категории</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">ЧаВо</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">О нас</a></li>
                <li class="nav-item"><a class="nav-link" href="#contacts">Контакты</a>
                </li>
            </ul>
            <input type="text" class="rounded-pill btn-rounded"/>
                <span></span>

            <a href="#" class="btn btn-primary rounded-pill m-2">Найти</a>
        </div>

        <div class="collapse navbar-collapse justify-content-end">
            @auth
            <div>
                <img src="{{ asset('mini-parts/profile.svg') }}" alt="" style="width: 60px">
            </div>
            @else
            <div>
{{--                <button class="btn-primary rounded-pill">Войти</button>--}}
{{--                <a href="{{ route('login') }}" class="text-sm text-white underline">Войти</a>--}}
                <a href="{{ route('login') }}" class="btn btn-primary rounded-4">Войти</a>
                <a href="{{ route('register') }}" class="btn btn-outline-light rounded-4">Регистрация</a>
            </div>
            @endauth
        </div>

    </div>
</nav>
