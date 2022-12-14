<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="{{ setting('title') }}">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ setting('title') }} - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"> 
    <link rel="icon" href="{{ asset(setting('favicon')) }}">
    
    <link rel="stylesheet" href="{{ asset('web/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('web/fonts/icofont/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/fonts/fontawesome/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/vendor/venobox/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/vendor/slickslider/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/vendor/niceselect/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/vendor/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/home-category.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/product-details.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/user-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/orderlist.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('web/story/demo/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web/story/dist/zuck.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/story/dist/skins/snapgram.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/marquee.css') }}">
    @include('web.layouts.style.style')
</head>
<body>
    @include('web.layouts.loader')
    <div class="modal fade" id="shopping_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal" id="shopping_modal_button"><i class="icofont-close"></i></button>
                <img class="img-fluid  rounded" src="{{ asset(setting('popup')) }}" alt="{{ setting('title') }}">
            </div>
        </div>
    </div>
    <div class="backdrop"></div>
    <a class="backtop fas fa-arrow-up" href="#"></a>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mobile-currency">
                    <p class="text-white">
                        <span class="usd"></span>
                        <span class="eur"></span>
                    </p>
                </div>
                <div class="col-lg-6 mobile-social custom-text-align-right">
                    <a class="text-white custom-margin-right-0-5" href="{{ setting('facebook') }}"><i class="icofont-facebook"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="{{ setting('twitter') }}"><i class="icofont-twitter"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="{{ setting('instagram') }}"><i class="icofont-instagram"></i></a>
                    <a class="text-white custom-margin-right-0-5" href="mailto:{{ setting('mail') }}"><i class="fas fa-envelope"></i></a>
                    <a class="text-white" href="tel:{{ setting('phone') }}"><i class="icofont-phone"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header class="header-part">
        <div class="container">
            <div class="header-content">
                <div class="header-media-group">
                    @auth
                        <a href="{{ route('web.account.index') }}" class="header-user">
                            <i class="fa fa-user"></i>
                        </a>
                    @else
                        <a href="{{ route('web.user.login.index') }}" class="header-user">
                            <i class="fa fa-user"></i>
                        </a>
                    @endauth
                    <a href="{{ route('web.index') }}">
                        <img src="{{ asset(setting('logo')) }}" alt="{{ setting('title') }}">
                    </a>
                    <button class="header-src"><i class="fas fa-search"></i>
                    </button>
                </div>
                <a href="{{ route('web.index') }}" class="header-logo">
                    <img src="{{ asset(setting('logo')) }}" alt="{{ setting('title') }}">
                </a>
                @auth
                    <div class="header-widget-group">
                        @role('admin')
                        <a href="{{ route('panel.index') }}" class="header-widget" title="@lang('words.admin_panel')">
                            <i class="fa fa-wrench"></i>
                        </a>
                        @endrole
                        <a href="{{ route('web.account.index') }}" class="header-widget" title="@lang('words.my_account')">
                            <i class="fa fa-user"></i>
                        </a>
                        <a href="{{ route('web.account.logout.store') }}" class="header-widget" title="@lang('words.logout')">
                            <i class="fa fa-sign-out-alt"></i>
                        </a>
                    </div>
                @else
                    <a href="{{ route('web.user.login.index') }}" class="header-widget" title="@lang('words.login')">
                        <i class="fa fa-user"></i>
                    </a>
                @endauth
                
                <form class="header-form" id="realtime-search-submit" method="GET" action="{{ route('web.search.products.store') }}">
                    <input type="text" name="search" id="search_input_typing" autocomplete="off" placeholder="">
                    <button type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <div class="header-widget-group">
                    <button class="header-widget header-wish">
                        <i class="fas fa-heart"></i>
                        <sup>{{ Cart::instance('wishlist')->content()->count() }}</sup>
                    </button>
                    <button class="header-widget header-cart">
                        <i class="fas fa-shopping-basket"></i>
                        <sup>{{ Cart::instance('cart')->content()->count() }}</sup>
                        <span>@lang('words.total_price')<small>{{ getMoneyOrderShoppingCart(Cart::instance('cart')->subtotal()) }}</small></span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    @include('web.layouts.banner')
    @include('web.layouts.menu.navbar')
    @include('web.layouts.menu.sidebar')
    @include('web.layouts.menu.cart')
    @include('web.layouts.menu.wish')
    @include('web.layouts.menu.mobile')