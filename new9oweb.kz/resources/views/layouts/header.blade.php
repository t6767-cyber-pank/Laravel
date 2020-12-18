<!doctype html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{setting('site.title')}}</title>
    <meta content="{{setting('site.description')}}" name="description">
    <meta content="{{setting('site.meta_keywords')}}" name="keywords">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="format-detection" content="telephone=no">
    <!-- This make sence for mobile browsers. It means, that content has been optimized for mobile browsers -->
    <meta name="HandheldFriendly" content="true">

    <!-- Stylesheet -->
    <link href="{!! asset('static/css/main.css') !!}" rel="stylesheet" type="text/css" >
    <link href="{!! asset('static/css/separate-css/custom.css') !!}" rel="stylesheet" type="text/css">

    <!--  Open Graph Tags -->
    <meta property="og:title" content="{{setting('site.title')}}" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="{{setting('site.description')}}" />
    <meta property="og:image" content="/storage/{{setting('site.logo')}}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="300" />
    <meta property="twitter:description" content="{{setting('site.description')}}" />
    <link rel="image_src" href="/storage/{{setting('site.logo')}}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{!! asset('favicon.ico') !!}">

    <script>
        (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
    </script>
    <!--[if lt IE 9 ]>
    <script src="static/js/separate-js/html5shiv-3.7.2.min.js" type="text/javascript"></script>
    <script src="static/js/separate-js/respond.min.js" type="text/javascript"></script>
    <meta content="no" http-equiv="imagetoolbar">
    <![endif]-->
</head>

<body>
<!-- Header Begin -->
<header class="header">
    <div class="container header__container">
        <button type="button" class="burger jsBurgerMenu">
            <span class="burger__item"></span>
        </button>
        <a href="/" class="logo" title="9 oweb">{{setting('site.title')}}</a>
        <div class="header__right">
            <a href="tel:{{setting('contacts.telephone')}}" class="header__contacts">{{setting('contacts.telephone')}}</a>
            <a href="mailto:{{setting('contacts.mail')}}" class="header__contacts">{{  setting('contacts.mail') }}</a>
            <a href="#" class="button -blue header__button" data-target="#modal-cta" data-toggle="modal">{{setting('site.getZayavka')}}</a>
            <div class="lang">
                <a href="#" class="lang__link -active">Ru</a>
                <a href="#" class="lang__link">En</a>
            </div>
        </div>
    </div>
</header>
<!--/. Header End -->

<!-- Header Begin -->
<header class="header">
    <div class="container header__container">
        <button type="button" class="burger" data-target="#modal-menu" data-toggle="modal">
            <span class="burger__item"></span>
        </button>
        <a href="/" class="logo" title="{{setting('site.title')}}">{{setting('site.title')}}</a>
        <div class="header__right">
            <a href="tel:{{setting('contacts.telephone')}}" class="header__contacts">{{setting('contacts.telephone')}}</a>
            <a href="mailto:{{  setting('contacts.mail') }}" class="header__contacts">{{  setting('contacts.mail') }}</a>
            <a href="#" class="button -blue header__button" data-target="#modal-cta" data-toggle="modal">Оставить заявку</a>
            <div class="lang">
                <a href="#" class="lang__link -active">Ru</a>
                <a href="#" class="lang__link">En</a>
            </div>
        </div>
    </div>
</header>
<!--/. Header End -->
