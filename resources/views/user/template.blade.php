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
    <link href="{{ url('assets/eastpearl-color.png') }}" rel="icon" type="image/png">
    <title>@yield('title') | {{ config('app.name') }} - {{ config('app.slogan') }}</title>

    @yield('style')

</head>
<style>
    .stretched {
        background-color: #af3e3e !important;
    }
</style>

<body class="stretched">
    @php
        use App\Models\Ads;

        $iklanAtas = Ads::where('status', 1)
            ->whereIn('active_status', [1]) // Ganti dengan nilai yang sesuai
            ->get();
        $iklanPopup = Ads::where('status', 3)
            ->whereIn('active_status', [1]) // Ganti dengan nilai yang sesuai
            ->get();
    @endphp
    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">
        <?php
        $segments = Request::segments();
        ?>
        {{ view('user.header') }}
        @if ($segments == null)
            <style>
                .swiper-slide {
                    height: 800px !important;

                    @media (max-width: 768px) {
                        height: 90% !important;
                        /*width: 100% !important;*/
                    }

                }

                .swiper-button-prev,
                .swiper-button-next {
                    display: none !important;
                }

                .swiper-slide-bg {
                    filter: brightness(70%);
                    /* You can adjust the percentage as needed */
                }

                .swiper_wrapper .swiper-slide {
                    margin-top: -50px !important;

                    @media (max-width: 760px) {
                        margin-top: -50px !important;
                    }
                }

                /*.slider-container {*/
                /*    @media (max-width: 760px) {*/
                /*        padding-top: 0px !important;*/
                /*    }*/
                /*}*/
            </style>

            <div class="d-none d-lg-block">

                <section id="slider"
                    class="slider-element swiper_wrapper min-vh-40 min-vh-md-100 dark include-header">
                    <div class="slider-inner">
                        <div class="swiper swiper-parent">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide dark">
                                    {{-- <div class="container-fluid py-5 text-center">
                                        <img src="{{ url('assets/logo-light.png') }}" id="logo-on-header">
                                        <p class="text-white d-none d-md-block display-6" style="font-size: 20px;">
                                            {{ strtoupper(__('home.portal_text')) }} <br>
                                            (CIREBON KUNINGAN INDRAMAYU MAJALENGKA)
                                        </p>
                                        <p class="text-white d-block d-md-none"
                                            style="font-size:7px; margin-top: -1rem;">
                                            {{ strtoupper(__('home.portal_text')) }} <br>
                                            (CIREBON KUNINGAN INDRAMAYU MAJALENGKA)
                                        </p>
                                        <div class="language">
                                            <a href="{{ url('atur-bahasa/id') }}"
                                                class="btn text-center bg-btn-language but_lang1">
                                                BAHASA INDONESIA
                                            </a>
                                            <a href="{{ url('atur-bahasa/en') }}"
                                                class="btn text-center bg-btn-language but_lang2">
                                                ENGLISH
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="swiper-slide-bg" style="background-image: url('assets/bg/padar.png');">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="d-block d-lg-none">
                <section id="slider" class="slider-element swiper_wrapper min-vh-md-100 dark include-header"
                    style="height: 395px; margin-bottom: -135px !important;">
                    <div class="slider-inner">
                        <div class="swiper swiper-parent">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide dark">
                                    {{-- <div class="container-fluid py-5 text-center">
                                        <img src="{{ url('assets/logo-light.png') }}" id="logo-on-header">
                                        <p class="text-white d-none d-md-block display-6" style="font-size: 20px;">
                                            {{ strtoupper(__('home.portal_text')) }} <br>
                                            (CIREBON KUNINGAN INDRAMAYU MAJALENGKA)
                                        </p>
                                        <p class="text-white d-block d-md-none"
                                            style="font-size:7px; margin-top: -1rem;">
                                            {{ strtoupper(__('home.portal_text')) }} <br>
                                            (CIREBON KUNINGAN INDRAMAYU MAJALENGKA)
                                        </p>
                                        <div class="language">
                                            <a href="{{ url('atur-bahasa/id') }}"
                                                class="btn text-center bg-btn-language but_lang1">
                                                BAHASA INDONESIA
                                            </a>
                                            <a href="{{ url('atur-bahasa/en') }}"
                                                class="btn text-center bg-btn-language but_lang2">
                                                ENGLISH
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="swiper-slide-bg" style="background-image: url('assets/bg/padar.png');">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            {{-- <div class=" d-block d-lg-none"> --}}
            <section id="slider" class="slider-element slider-parallax min-vh-40 min-vh-md-100 dark include-header"
                style="background: url(@yield('cover')) no-repeat; background-size: cover;margin-bottom:0px; background-position: center center;">
                <div class="slider-inner">
                    <div class="vertical-middle slider-element-fade">
                        <div class="container-fluid py-5">
                            <div class="heading-block text-center border-bottom-0 mt-6 mt-md-0">

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- </div> --}}
        @endif

        <style>
            .click-me a {
                color: #ffffff;
                padding: 5px 20px;
                background: rgb(255 255 255 / 20%);
                border-radius: 50px;
            }

            /* Adsense style popup */
            svg {
                width: 1.2em;
                height: 1.2em;
            }

            div#ad_position_box button {
                background: transparent;
                border: unset;
                font-size: 20px;
                cursor: pointer;
            }

            .flex-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            div#ad_position_box {
                display: none;
                align-items: center;
                justify-content: center;
                height: 100%;
                width: 100%;
                position: fixed;
                top: 50%;
                transform: translateY(-50%);
                backdrop-filter: blur(50px);
                z-index: 99999;
            }

            div#ad_position_box.active {
                display: flex;
            }

            div#ad_position_box .card {
                background: #fff;
                padding: 10px 24px 25px;
                border-radius: 6px;
                position: relative;
                box-shadow: 0px 8px 12px rgb(60 64 67 / 15%), 0px 4px 4px rgb(60 64 67 / 30%);
            }

            .ad-content {
                display: block;
                box-shadow: 0px 10px 22px rgb(0 0 0 / 65%);
            }

            .ad-content img {
                display: block;
                width: %;
            }
        </style>


        <!-- Content
  ============================================= -->

        {{-- <div class="popup-wrapper " id="popup">
            <a href="https://visitcirebon.id/layanan-produk/tourism-card">
                <div class="popup-container" style="">
                </div>
                <a class="popup-close" href="#popup">X</a>
            </a>
        </div> --}}

        {{-- <div class="container">
            <div class="click-me"><a href="#">Click Me</a></div>
        </div>
        <div id="ad_position_box">
            <div class="card">
                <div class="top-row flex-row">
                    <div class="colmun">
                        <span id="countdown" style="font-size: 15px">Iklan</span>
                    </div>
                    <div class="colmun">

                        <button class="skip" style="color: #ce0a0a">Close</button>
                    </div>
                </div>
                <div class="ad-content d-none d-lg-block" style="width: 50%; height: 50%; margin:auto;">
                    @foreach ($iklanPopup as $ads)
                    <a href="https://visitcirebon.id/layanan-produk/tourism-card">
                        <img src="{{ url('assets/iklan/' . $ads->picture) }}" alt="{{ $ads->slug }}">
                    </a>
                </div>
                <div class="ad-content d-block d-lg-none" style="width: 100%; height: 100%; margin:auto;">
                    <a href="https://visitcirebon.id/layanan-produk/tourism-card">
                        <img src="{{ url('assets/iklan/' . $ads->picture) }}" alt="{{ $ads->slug }}">
                    </a>
                    @endforeach
                </div>
            </div>
        </div> --}}


        <section>

            @yield('content')
        </section>
        <!-- #content end -->

        {{ view('user.footer') }}

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <!-- <div id="gotoTop" class="uil uil-angle-up"></div> -->

    <!-- <a href="https://wa.me/<?= str_replace('+', '', getOption('cs_phone')) ?>" target="_blank" id="chatWA">
  <img src="{{ url('assets/logo-wa.png') }}" width="50px" class="rounded-circle">
 </a> -->
    <div class="whatsapp-button">
        <a href="https://wa.me/<?= str_replace('+', '', getOption('cs_phone')) ?>?text=Halo, saya ingin diskusi tentang Visit Cirebon."
            target="_blank">
            <img src="{{ url('assets/logo-wa.png') }}" alt="WhatsApp">
        </a>
    </div>

    <!-- JavaScripts
 ============================================= -->
    <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('canvas') }}/js/plugins.min.js"></script>
    <script src="{{ url('canvas') }}/js/functions.bundle.js"></script>
    <script>
        // looping background
        $(document).ready(function() {
            var swiper = new Swiper('.swiper', {
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                loop: true,
            });
        });

        // iklan
        window.onload = function() {
            // Set a timeout of 15 seconds before triggering the ad
            setTimeout(function() {
                $(".click-me a").trigger("click");
                startCountdown();
            }, 15000);
        };

        $(".click-me a").click(function() {
            $("#ad_position_box").addClass("active");
            setTimeout(function() {
                $("#ad_position_box").slideUp();
            }, 15000);
            startCountdown();
        });

        $(".skip").click(function() {
            $("#ad_position_box").removeClass("active");
        });

        function startCountdown() {
            // Waktu dalam detik untuk 48 jam
            var countdownTime = 48 * 60 * 60;

            var countdownElement = document.getElementById("countdown");

            function updateCountdown() {
                var hours = Math.floor(countdownTime / 3600);
                var minutes = Math.floor((countdownTime % 3600) / 60);
                var seconds = countdownTime % 60;

                // Format waktu ke format "HH:MM:SS"
                // var formattedTime = hours + " jam " + minutes + " menit " + seconds + " detik";

                countdownElement.textContent = "Available " + formattedTime + " Soon";

                if (countdownTime > 0) {
                    countdownTime--;
                    setTimeout(updateCountdown, 1000); // Perbarui setiap 1 detik
                }
            }

            updateCountdown();
        }
    </script>
    @yield('script')

</body>

</html>
