<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}}</title>
    <meta content="{{$description}}" name="description">
    <meta content="{{$keyWords}}" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="format-detection" content="telephone=no">
    <!-- This make sence for mobile browsers. It means, that content has been optimized for mobile browsers -->
    <meta name="HandheldFriendly" content="true">

    <!-- Stylesheet -->
    <link href="/childstatic/css/main.css" rel="stylesheet" type="text/css">
    <link href="/childstatic/css/separate-css/custom.css" rel="stylesheet" type="text/css">

    <!--  Open Graph Tags -->
    <meta property="og:title" content="{{$title}}" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="{{$description}}" />
    <meta property="og:image" content="" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="twitter:description" content="{{$description}}" />
    <link rel="image_src" href="" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{!! asset('favicon.ico') !!}">

    <script>
        (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
    </script>
    <!--[if lt IE 9 ]>
    <script src="/childstatic/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
    <script src="/childstatic/js/separate-js/respond.min.js" type="text/javascript"></script>
    <meta content="no" http-equiv="imagetoolbar">
    <![endif]-->
</head>

<body>

<div class="container">

    <!-- Social Bar Begin -->
    <div class="socialbar is-active">
        <a href="{{setting('site.tweeterlink')}}" target="_blank" class="socialbar__link -tw">Twitter</a>
        <a href="{{setting('site.facebook')}}" target="_blank" class="socialbar__link -fb">Facebook</a>
        <a href="{{setting('site.instagramm')}}" target="_blank" class="socialbar__link -insta">Instagram</a>
    </div>
    <!--/. Social Bar End -->

</div>

<!-- App Begin -->
<div class="app">

    <!-- App Wrapper Begin -->
    <div class="app__wrapper">

        <!-- Header Begin -->
        <header class="header">
            <div class="container header__container">
                <button type="button" class="burger" data-target="#modal-menu" data-toggle="modal">
                    <span class="burger__item"></span>
                </button>
                <a href="/" class="logo" title="{{$title}}">{{$title}}</a>
                <div class="header__right">
                    <a href="tel:{{setting('contacts.telephone')}}" class="header__contacts">{{setting('contacts.telephone')}}</a>
                    <a href="mailto:{{setting('contacts.mail')}}" class="header__contacts">{{setting('contacts.mail')}}</a>
                    <a href="#" class="button -blue header__button jsBurgerMenu" data-target="#modal-cta" data-toggle="modal">Оставить заявку</a>
                    <div class="lang">
                        <a href="#" class="lang__link -active">Ru</a>
                        <a href="#" class="lang__link">En</a>
                    </div>
                </div>
            </div>
        </header>
        <!--/. Header End -->
