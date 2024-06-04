<?php
use Illuminate\Support\Facades\App;
$locale = App::currentLocale();
?>
<!-- Header
============================================= -->
<link rel="stylesheet" href="style.css">
@php
    use App\Models\Category;

    $categories = Category::get();
@endphp
<style>
    .header-misc {
        display: flex;
        align-items: center;
    }

    .primary-menu-trigger {
        /* margin-right: 10px; */
        /* Adjust as needed */
    }

    .language-selector {
        position: relative;
    }

    .language-selector .sub-menu-container {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        /* Adjust to match your theme */
        padding: 10px;
        border-radius: 5px;
        width: 8em;
        color: #1b1b1b;
    }

    .language-selector:hover .sub-menu-container {
        display: block;
    }

    .primary-menu .sub-menu-container {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        /* Adjust to match your theme */
        padding: 10px;
        border-radius: 5px;
    }

    .primary-menu .menu-item:hover .sub-menu-container {
        display: block;
    }

    .primary-menu.d-lg-none .sub-menu-container {
        position: static;
        display: none;
        background-color: transparent;
        padding: 0;
    }

    .primary-menu.d-lg-none .menu-item:hover .sub-menu-container {
        display: block;
    }
</style>
<header id="header" class=" page-section white shadow-lg" style="opacity: 0.8; z-index: 9999999999;">
    <div id="header-wrap">
        <div class="container-fluid">
            <div class="header-row">
                <!-- Logo -->
                <div class="d-none d-md-block" id="logo" style="display: flex; ">
                    <a href="{{ url('/') }}" class="ps-2 d-flex">


                        <img class="mt-auto mb-auto" src="{{ url('assets/wiwarna.png') }}"
                            alt="wonderful indonesia icon" style="height: 3rem !important; width: auto; ">
                        <!-- Sesuaikan ukuran dan margin sesuai kebutuhan -->
                        <img class=" py-1 rounded-lg" srcset="{{ url('assets/eastpearl_logo5.png') }}"
                            src=" {{ url('assets/eastpearl_logo5.png') }}" alt="Logo EastPearl"
                            style="width: 6rem; height: 4rem !important;">
                    </a>
                </div>
                <div class="d-block d-md-none" id="logo" style="display: flex; ">
                    <a href="{{ url('/') }}" class=" d-flex">


                        <img class="mt-auto mb-auto" src="{{ url('assets/wiwarna.png') }}" alt="WI color"
                            style="height: 0.8em !important;">
                        <!-- Sesuaikan ukuran dan margin sesuai kebutuhan -->
                        <img class="rounded " srcset="{{ url('assets/eastpearl_logo5.png') }}"
                            src=" {{ url('assets/eastpearl_logo5.png') }}" alt="Logo EastPearl"
                            style=" width: 1.5em !important; height: 1em; ">
                        <!-- Sesuaikan ukuran dan margin sesuai kebutuhan -->
                    </a>

                </div>

                <div class="header-misc ms-auto d-flex align-items-center">
                    <!-- Primary Navigation (Desktop) -->
                    <nav class="primary-menu d-none d-lg-block">
                        <ul class="menu-container one-page-menu">
                            <li class="menu-item"><a class="menu-link" href="{{ url('/') }}">
                                    <div>{{ __('menu.home') }}</div>
                                </a></li>
                            <li class="menu-item">
                                <a class="menu-link" href="#">
                                    <div>{{ __('menu.layanan') }} <i class="bi-caret-down-fill text-smaller me-0"></i>
                                    </div>
                                </a>
                                <ul class="sub-menu-container p-lg-0">
                                    <li class="menu-item">
                                        @foreach ($categories as $category)
                                            <a class="menu-link"
                                                href="{{ route('layanan.kategori', ['slug' => $category->slug]) }}">
                                                <div>
                                                    @if (App::isLocale('id'))
                                                        {{ $category->name }}
                                                    @elseif(App::isLocale('en'))
                                                        {{ $category->name_en }}
                                                    @else
                                                        {{ $category->name_mandarin }}
                                                    @endif
                                                </div>
                                            </a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('about') }}">
                                    <div>{{ __('menu.tentang') }}</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('galeri') }}">
                                    <div>{{ __('menu.galeri') }}</div>
                                </a></li>
                            <li class="menu-item"><a class="menu-link" href="{{ url('traveltopia') }}">
                                    <div>{{ __('menu.news') }}</div>
                                </a></li>
                            <li class="menu-item">
                                <a class="menu-link" href="#">
                                    <div class="d-flex">
                                        @if (App::isLocale('id'))
                                            <img class="h-6"
                                                src="https://cdn-icons-png.flaticon.com/128/11654/11654463.png"
                                                alt="Indonesia">
                                        @elseif (App::isLocale('en'))
                                            <img class="h-6"
                                                src="https://cdn-icons-png.flaticon.com/128/323/323329.png"
                                                alt="English">
                                        @else
                                            <img class="h-6"
                                                src="https://cdn-icons-png.flaticon.com/128/197/197375.png"
                                                alt="Mandarin">
                                        @endif
                                        <i class="bi-caret-down-fill text-smaller me-0"></i>
                                    </div>
                                </a>
                                <ul class="sub-menu-container p-lg-0">
                                    <li class="menu-item"><a class="menu-link" href="{{ url('atur-bahasa/id') }}">
                                            <div class="d-flex">
                                                <img class="h-6 mt-auto mb-auto"
                                                    src="https://cdn-icons-png.flaticon.com/128/11654/11654463.png"
                                                    alt="indonesia">
                                                <span class="ml-2 text-dark">Bahasa</span>
                                            </div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('atur-bahasa/en') }}">
                                            <div class="d-flex">
                                                <img class="h-6 mt-auto mb-auto"
                                                    src="https://cdn-icons-png.flaticon.com/128/323/323329.png"
                                                    alt="english">
                                                <span class="ml-2 text-dark">English</span>
                                            </div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ url('atur-bahasa/mandarin') }}">
                                            <div class="d-flex">
                                                <img class="h-6 mt-auto mb-auto"
                                                    src="https://cdn-icons-png.flaticon.com/128/197/197375.png"
                                                    alt="mandarin">
                                                <span class="ml-2 text-dark">Mandarin</span>
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>


                    <!-- Mobile Menu Trigger & Language Selector -->
                    <div class="d-flex align-items-center d-lg-none">
                        <div class="primary-menu-trigger ">
                            <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                            </button>
                        </div>
                        <div class="language-selector">
                            <a class="menu-link" href="#">
                                <div class="d-flex">
                                    @if (App::isLocale('id'))
                                        <img class="h-6"
                                            src="https://cdn-icons-png.flaticon.com/128/11654/11654463.png"
                                            alt="Indonesia">
                                    @elseif (App::isLocale('en'))
                                        <img class="h-6"
                                            src="https://cdn-icons-png.flaticon.com/128/323/323329.png"
                                            alt="English">
                                    @else
                                        <img class="h-6"
                                            src="https://cdn-icons-png.flaticon.com/128/197/197375.png"
                                            alt="Mandarin">
                                    @endif
                                    <i class="bi-caret-down-fill text-smaller me-0"></i>
                                </div>
                            </a>
                            <ul class="sub-menu-container">
                                <li class="menu-item"><a class="menu-link" href="{{ url('atur-bahasa/id') }}">
                                        <div class="d-flex"><img class="h-4 mt-auto mb-auto"
                                                src="https://cdn-icons-png.flaticon.com/128/11654/11654463.png"
                                                alt="indonesia">
                                            <p class="ml-2 text-dark mt-auto mb-auto">Bahasa</p>
                                        </div>
                                    </a></li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('atur-bahasa/en') }}">
                                        <div class="d-flex">
                                            <img class="h-4 mt-auto mb-auto"
                                                src="https://cdn-icons-png.flaticon.com/128/323/323329.png"
                                                alt="englis">
                                            <p class="ml-2 text-dark mt-auto mb-auto">English</p>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('atur-bahasa/mandarin') }}">
                                        <div class="d-flex"><img class="h-4 mt-auto mb-auto"
                                                src="https://cdn-icons-png.flaticon.com/128/197/197375.png"
                                                alt="mandarin">
                                            <p class="ml-2 text-dark mt-auto mb-auto">Mandarin</p>
                                        </div>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Primary Navigation (Mobile) -->
                <nav class="primary-menu d-lg-none">
                    <ul class="menu-container">
                        <li class="menu-item"><a class="menu-link" href="{{ url('/') }}">
                                <div>Home</div>
                            </a></li>
                        <li class="menu-item">
                            @foreach ($categories as $category)
                                <a class="menu-link"
                                    href="{{ route('layanan.kategori', ['slug' => $category->slug]) }}">
                                    <div>
                                        @if (App::isLocale('id'))
                                            {{ $category->name }}
                                        @elseif(App::isLocale('en'))
                                            {{ $category->name_en }}
                                        @else
                                            {{ $category->name_mandarin }}
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('about') }}">
                                <div>{{ __('menu.tentang') }}</div>
                            </a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('galeri') }}">
                                <div>{{ __('menu.galeri') }}</div>
                            </a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ url('traveltopia') }}">
                                <div>{{ __('menu.news') }}</div>
                            </a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
