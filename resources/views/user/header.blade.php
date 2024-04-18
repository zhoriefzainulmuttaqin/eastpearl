<?php
use Illuminate\Support\Facades\App;
$locale = App::currentLocale();
?>
<!-- Header
============================================= -->
<link rel="stylesheet" href="style.css">
<header id="header" class="transparent-header page-section dark">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="header-row">
                <!-- Logo
                ============================================= -->

                <div class="d-none d-md-block" id="logo" style="display: flex; ">
                    <a href="{{ url('/') }}" class="ps-2 d-flex">

                        <img class="logo-default py-1"
                            srcset="{{ url('assets/eastpearl1.png') }} {{ url('assets/eastpearl1.png') }}"
                            src="{{ url('assets/eastpearl1.png') }}" alt="Logo EastPearl">
                        <img src="{{ url('assets/wiputih.png') }}" alt=""
                            style="height: 50px; width: auto; margin: 0 10px;">
                        <!-- Sesuaikan ukuran dan margin sesuai kebutuhan -->
                        <img class="logo-dark py-1" srcset="{{ url('assets/eastpearl1.png') }}"
                            src=" {{ url('assets/eastpearl1.png') }}" alt="Logo EastPearl">
                    </a>
                </div>
                <div class="d-block d-md-none" id="logo" style="display: flex; ">
                    <a href="{{ url('/') }}" class="ps-2 d-flex">

                        <img class="logo-default py-1"
                            srcset="{{ url('assets/eastpearl1.png') }} {{ url('assets/eastpearl1.png') }}"
                            src="{{ url('assets/eastpearl1.png') }}" alt="Logo EastPearl">
                        <img class="logo-dark py-1 m-auto" srcset="{{ url('assets/eastpearl1.png') }}"
                            src=" {{ url('assets/eastpearl1.png') }}" alt="Logo EastPearl"
                            style="width: 100% !important;">
                        <img src="{{ url('assets/wiputih.png') }}" alt=""
                            style="height: 35px; width: auto; margin-left: 20px;">
                        <!-- Sesuaikan ukuran dan margin sesuai kebutuhan -->
                    </a>
                </div>

                <div class="header-misc ms-auto justify-content-lg-end">
                    <!-- Primary Navigation
                    ============================================= -->
                    <nav class="primary-menu d-none d-sm-none d-md-none d-lg-block d-xl-block">
                        <ul class="menu-container one-page-menu">
                            <li class="menu-item"><a class="menu-link" href="{{ url('/') }}">
                                    <div>Home</div>
                                </a></li>
                            <li class="menu-item">

                                <a class="menu-link" href="#">
                                    <div>
                                        {{ __('menu.services') }}
                                        <i
                                            class="bi-caret-down-fill text-smaller d-none d-lg-inline-block d-lg-inline-block d-xl-inline-block me-0"></i>
                                    </div>
                                </a>
                                <ul class="sub-menu-container mega-menu-dropdown p-lg-0">
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url('open-trip') }}">
                                            <div>{{ __('menu.open_trip') }}</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url('private-trip') }}">
                                            <div>{{ __('menu.private_trip') }}</div>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a class="menu-link" href="{{ url('land-trip') }}">
                                            <div>{{ __('menu.land_trip') }}</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('about') }}">
                                    <div>{{ __('menu.about') }}</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('galeri') }}">
                                    <div>Galeri</div>
                                </a></li>
                            <li class="menu-item">
                        </ul>

                    </nav><!-- #primary-menu end -->
                    <!-- Top Notif
                    ============================================= -->
                    <!-- <div id="top-notif" class="header-misc-icon">
                        <a href="#"><i class="bi-bell"></i><span class="top-cart-number bg-danger">0</span></a>
                    </div> -->
                    <!-- #top-notif end -->
                    <!-- Top Cart
                    ============================================= -->
                    <!-- <div id="top-cart" class="header-misc-icon">
                        <a href="#" id="top-cart-trigger">
                            <i class="bi-cart"></i>
                            <span class="top-cart-number bg-danger">0</span>
                        </a>
                    </div> -->
                    <!-- #top-cart end -->
                    {{-- @if (Auth()->check())
                        <a href="{{ url('profil') }}" class="btn btn-danger btn-sm ms-3 d-none d-md-block d-lg-block">
                            <i class="uil-user"></i>
                            {{ __('menu.profile') }}
                        </a>
                    @else
                        <a href="{{ url('login') }}" class="btn btn-danger btn-sm ms-3 d-none d-md-block d-lg-block">
                            <i class="uil-signin"></i>
                            {{ __('menu.login') }}
                        </a>
                    @endif --}}

                </div>
                <div class="primary-menu-trigger">
                    <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                        <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                    </button>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu d-block d-sm-block d-md-block d-lg-none d-xl-none">

                    <ul class="menu-container">
                        <li class="menu-item"><a class="menu-link" href="{{ url('/') }}">
                                <div>Home</div>
                            </a></li>
                        <li class="menu-item">

                            <a class="menu-link" href="#">
                                <div>
                                    {{ __('menu.services') }}
                                    <i
                                        class="bi-caret-down-fill text-smaller d-none d-lg-inline-block d-lg-inline-block d-xl-inline-block me-0"></i>
                                </div>
                            </a>
                            <ul class="sub-menu-container mega-menu-dropdown p-lg-0">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('open-trip') }}">
                                        <div>{{ __('menu.open_trip') }}</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('private-trip') }}">
                                        <div>{{ __('menu.private_trip') }}</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('land-trip') }}">
                                        <div>{{ __('menu.land_trip') }}</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('about') }}">
                                <div>{{ __('menu.about') }}</div>
                            </a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('galeri') }}">
                                <div>Galeri</div>
                            </a></li>
                        <li class="menu-item">
                            {{-- @if (Auth()->check())
                            <li class="menu-item d-block d-md-none d-xl-none mb-3">
                                <a class="menu-link btn btn-danger btn-sm" href="{{ url('profil') }}">
                                    <div>
                                        <i class="uil-user"></i>
                                        {{ __('menu.profile') }}
                                    </div>
                                </a>
                            </li>
                        @else
                            <li class="menu-item d-block d-md-none d-xl-none mb-3">
                                <a class="menu-link btn btn-danger btn-sm" href="{{ url('login') }}">
                                    <div>
                                        <i class="uil-signin"></i>
                                        {{ __('menu.login') }}
                                    </div>
                                </a>
                            </li>
                        @endif --}}
                    </ul>

                </nav><!-- #primary-menu end -->
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
