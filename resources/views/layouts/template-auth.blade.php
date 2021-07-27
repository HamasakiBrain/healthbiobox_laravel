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
    <style>
        .no-bg {
            background-image: none;
        }
        .transparent {
            background-color: transparent;
        }
        .page-title {
            font-size: 48px;
            font-family: "Gilroy-SemiBold", sans-serif;
            color: rgb(35, 35, 35);
            line-height: 1.2;

        }

        @media screen  and (max-width: 550px){
            .form-100 {
                width: 100%
            }
        }

    </style>
    <title>HealthBioBox - @yield('title')</title>
</head>
<body class="no-bg">
<section class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <img src="{{ asset('img/logo.png') }}" alt="" class="mx-auto d-block">
            <br>
            @yield('auth')
        </div>
        <div class="col-md-12">
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

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/r-2.2.9/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
