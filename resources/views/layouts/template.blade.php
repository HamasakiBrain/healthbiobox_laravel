<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/r-2.2.9/datatables.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
    <link rel="stylesheet" href="{{ asset('sass/gilroy.css') }}">
    <link rel="stylesheet" href="{{ asset('sass/main.css') }}">
    <title>HealthBioBox - @yield('title')</title>
    <style>
        .btn-orange {
            margin: 10px;
            max-width: max-content;
            font-family: "Gilroy-Bold", sans-serif;
            font-size: 18px;
            display: block;
            padding: 5px 15px;
            border-radius: 100px;
            text-decoration: none !important;
            color: #fff;
            background-color: #f27733;
            border: 0;
        }
    </style>
</head>
@php
    $user = Auth::user();
@endphp
<body>

<header class="container">
    <a href="#" class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="">
    </a>
    <div class="info-block">
        <div class="info-flex">
            <div class="info-block-title">Ваш ID</div>
            <div class="info-block-text">{{ $user->id }}</div>
        </div>
        <div class="info-flex">
            <div class="info-block-title">Ваш общий баланс</div>
            <div class="info-block-text">{{ $user->balance+$user->bonus_balance }} <small>руб.</small></div>
        </div>
        <div class="info-flex">
            <div class="info-block-title">Реферальная ссылка</div>
            <div class="info-block-text info-block-text_link" onclick="copyToClipboard('referal_link2')"><img src="{{ asset('img/copy.png') }}" alt=""> <span id="referal_link2">https://dasdasld.ru/asd</span>
            </div>
        </div>
    </div>
</header>
<section class="container">
    <div class="page-name">Личный кабинет</div>
    <div class="row">
        <div class="col-md-3">
            <button class="burger-mobile border-0 "><img src="{{ asset('img/burger.svg') }}" alt="" width="25"> Меню</button>
            <ul class="aside">
                <li><a href="{{ route('home') }}" class="{{ \request()->is('home') ? "active" : "" }}">Главная</a></li>
                <li><a href="{{ route('profile') }}" class="{{ \request()->is('my/profile') ? "active" : "" }}">Мой профиль</a></li>
                <li><a href="{{ route('bonus') }}" class="{{ \request()->is('my/bonus') ? "active" : "" }}">Бонусный счет</a></li>
                <li><a href="{{ route('orderHistory') }}" class="{{ \request()->is('my/orderHistory') ? "active" : "" }}">История заказов</a></li>
                <li><a href="{{ route('promo') }}" class="{{ \request()->is('my/promo') ? "active" : "" }}">Промоматериалы</a></li>
                <li><a href="{{ route('payAndDelivery') }}" class="{{ \request()->is('my/payAndDelivery') ? "active" : "" }}">Оплата и доставка</a></li>
                <li><a href="{{ route('contract') }}" class="{{ \request()->is('my/contract') ? "active" : "" }}">Договор</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
    </div>
</section>
<footer>
    <div class="container footer">
        <div class="logo">
            <a href="#" class="footer-logo">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>
        <div class="footer-text">
            HealthBioBox не предоставляет медицинских услуг и не заменяет медицинских консультаций. Все рекомендации не носят предписательного характера.
            Ознакомьтесь с Пользовательским соглашением перед покупкой
        </div>
        <div class="footer-socials">
            <div class="footer-socials-links">
                <a href="#">
                    <img src="{{ asset('img/instagram.png') }}" alt="">
                </a>
                <a href="#">
                    <img src="{{ asset('img/whatsapp.png') }}" alt="">
                </a>
            </div>
            <div class="footer-socials-contacts">
                <a href="#">+7 (987) 654-32-10</a>
                <a href="#" class="text-decoration">info@healthbiobox.com</a>
            </div>
        </div>
    </div>
</footer>
<div class="fixed-menu">
    <button class="my-close">
        <img src="{{ asset('img/close.svg') }}" alt="" width="25">
    </button>
</div>
<div class="modal fade" id="froudModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-title-margin" id="exampleModalLabel">Оставьте заявку на вывод средств
                    со своего бонусного счета</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" class="my-input" placeholder="Введите Ваше имя">
                    </div>
                    <div class="form-group">
                        <input type="text" class="my-input" placeholder="Введите Ваш номер телефона">
                    </div>
                    <button class="froud-btn">Оставить заявку</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/r-2.2.9/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
