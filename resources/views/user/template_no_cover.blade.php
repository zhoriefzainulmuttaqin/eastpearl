<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="{{ config('app.name') }} - {{ config('app.slogan') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- Core Style -->
    <link rel="stylesheet" href="{{ url('canvas') }}/style.css">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/font-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/custom.css">
    <link rel="stylesheet" href="{{ url('css/style-visit.css') }}">

    <!-- Document Title
 ============================================= -->
    <link href="{{ url('assets/eastpearl_logo3.png') }}" rel="icon" type="image/png">
    <title>@yield('title') | {{ config('app.name') }} - {{ config('app.slogan') }}</title>

    @yield('style')

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">

        <?php
        use Illuminate\Support\Facades\App;
        $locale = App::currentLocale();
        ?>
        <!-- Header
 ============================================= -->
        <link rel="stylesheet" href="style.css">
        <header id="header" class="page-section dark">
            <div id="header-wrap">
                <div class="container-fluid">
                    <div class="header-row">
                        <!-- Logo
     ============================================= -->

                        <div id="logo">
                            <a href="{{ url('/') }}" class="ps-2">
                                <img class="logo-default py-1" srcset="{{ url('assets/visit-light-nobg.png') }}"
                                    src="{{ url('assets/visit-light-nobg.png') }}" alt="Logo Visit Cirebon">
                                <img class="logo-dark py-1" srcset="{{ url('assets/logo-light.png') }}"
                                    src="{{ url('assets/logo-light.png') }}" alt="Logo Visit Cirebon">
                            </a>
                        </div><!-- #logo end -->

                        <div class="header-misc ms-auto justify-content-lg-end">
                            <!-- Primary Navigation
      ============================================= -->
                            <nav class="primary-menu d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                <ul class="menu-container one-page-menu">
                                    <li class="menu-item"><a class="menu-link" href="{{ url('/') }}">
                                            <div>Home</div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('wisata') }}">
                                            <div>{{ __('menu.destinations') }}</div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('event') }}">
                                            <div>{{ __('menu.events') }}</div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('kuliner') }}">
                                            <div>{{ __('menu.culinaries') }}</div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('oleh-oleh') }}">
                                            <div>{{ __('menu.souvenirs') }}</div>
                                        </a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ url('akomodasi') }}">
                                            <div>{{ __('menu.accomodations') }}</div>
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
                                                <a class="menu-link" href="{{ url('layanan-produk') }}">
                                                    <div>{{ __('menu.service_products') }}</div>
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a class="menu-link" href="{{ url('layanan-jasa') }}">
                                                    <div>{{ __('menu.our_services') }}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
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
                            @if (Auth()->check())
                                <a href="{{ url('profil') }}"
                                    class="btn btn-danger btn-sm ms-3 d-none d-md-block d-lg-block">
                                    <i class="uil-user"></i>
                                    {{ __('menu.profile') }}
                                </a>
                            @else
                                <a href="{{ url('login') }}"
                                    class="btn btn-danger btn-sm ms-3 d-none d-md-block d-lg-block">
                                    <i class="uil-signin"></i>
                                    {{ __('menu.login') }}
                                </a>
                            @endif

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
                                <li class="menu-item"><a class="menu-link" href="{{ url('wisata') }}">
                                        <div>{{ __('menu.destinations') }}</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('event') }}">
                                        <div>{{ __('menu.events') }}</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('kuliner') }}">
                                        <div>{{ __('menu.culinaries') }}</div>
                                    </a></li>
                                <li class="menu-item"><a class="menu-link" href="{{ url('oleh-oleh') }}">
                                        <div>{{ __('menu.souvenirs') }}</div>
                                    </a></li>
                                <!-- <li class="menu-item"><a class="menu-link" href="{{ url('berita') }}"><div>Berita</div></a></li> -->
                                <li class="menu-item"><a class="menu-link" href="{{ url('akomodasi') }}">
                                        <div>{{ __('menu.accomodations') }}</div>
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
                                            <a class="menu-link" href="{{ url('layanan-produk') }}">
                                                <div>{{ __('menu.service_products') }}</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="{{ url('layanan-jasa') }}">
                                                <div>{{ __('menu.our_services') }}</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @if (Auth()->check())
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
                                @endif
                            </ul>

                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->



        <!-- Content
  ============================================= -->
        <section id="content">
            @yield('content')
        </section><!-- #content end -->

        {{ view('user.footer_noads') }}

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <!-- <div id="gotoTop" class="uil uil-angle-up"></div> -->
    <!-- <a href="https://wa.me/<?= str_replace('+', '', getOption('cs_phone')) ?>" target="_blank" id="chatWA">
  <img src="{{ url('assets/logo-wa.png') }}" width="50px" class="rounded-circle">
 </a> -->
    <div class="whatsapp-button">
        <a href="https://wa.me/<?= str_replace('+', '', getOption('cs_phone')) ?>?text={{ __('content.float_wa_message') }}"
            target="_blank">
            <img src="{{ url('assets/logo-wa.png') }}" alt="WhatsApp">
        </a>
    </div>

    <!-- JavaScripts
 ============================================= -->
    <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('canvas') }}/js/plugins.min.js"></script>
    <script src="{{ url('canvas') }}/js/functions.bundle.js"></script>

    @yield('script')

</body>

</html>
