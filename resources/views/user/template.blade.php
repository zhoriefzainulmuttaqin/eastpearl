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
    <link rel="stylesheet" href="{{ url('canvas') }}/style.min.css">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/font-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/custom.min.css">
    <link rel="stylesheet" href="{{ url('css/style-visit.min.css') }}">

    <!-- Document Title
 ============================================= -->
    <link href="{{ url('assets/eastpearl_logo3.png') }}" rel="icon" type="image/png">
    <title>@yield('title') | {{ config('app.name') }} - {{ config('app.slogan') }}</title>

    @yield('style')

</head>
<style>
    .stretched {
        background-color: #af3e3e !important;
    }
</style>

<body class="stretched">

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
                    filter: brightness(110%);
                    /* You can adjust the percentage as needed */
                }

                .swiper_wrapper .swiper-slide {
                    margin-top: -50px !important;

                    @media (max-width: 768px) {
                        margin-top: -50px !important;
                    }
                }

                /*.slider-container {*/
                /*    @media (max-width: 760px) {*/
                /*        padding-top: 0px !important;*/
                /*    }*/
                /*}*/
            </style>
            <style>
                .swiper {
                    width: 100%;
                    padding-top: 50px;
                    padding-bottom: 50px;
                }

                .swiper-slide {
                    background-position: center;
                    background-size: cover;
                    width: 300px;
                    height: 300px;
                }

                .swiper-slide img {
                    display: block;
                    width: 100%;
                }

                @media (max-width: 768px) {
                    .swiper-slide img {
                        /* display: block; */
                        width: 100px !important;
                        height: 10rem !important;
                    }
                }

                /* ip 67 */
                @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) {
                    .atas {
                        /* width: 10em !important;
                        height: 10em !important; */
                    }
                }

                /* Portrait */
                @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: portrait) {
                    .atas {
                        /* width: 10em !important;
                        height: 10em !important; */

                    }
                }

                /* Landscape */
                @media only screen and (min-device-width: 375px) and (max-device-width: 667px) and (-webkit-min-device-pixel-ratio: 2) and (orientation: landscape) {
                    .atas {
                        /* width: 10em !important;
                        height: 10em !important; */
                    }
                }
            </style>

            <div class="d-none d-lg-block">

                <section id="slider"
                    class="bg_image slider-element slider-parallax min-vh-40 min-vh-md-100 dark include-header"
                    style="background: url('/assets/bg/padar.jpg') no-repeat; background-size: cover; margin-bottom:0px; background-position: center center;">
                    <div class="">
                        <div class="">

                            {{-- <div class="text-center border-bottom-0 mt-6 mt-md-0" style="">
                                <div class="language">
                                    <a href="{{ url('atur-bahasa/id') }}"
                                        class="btn text-center bg-btn-language but_lang1">
                                        BAHASA
                                    </a>
                                    <a href="{{ url('atur-bahasa/en') }}"
                                        class="btn text-center bg-btn-language but_lang2">
                                        ENGLISH
                                    </a>
                                    <a href="{{ url('atur-bahasa/mandarin') }}"
                                        class="btn text-center bg-btn-language but_lang3">
                                        普通话
                                    </a>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                </section>
            </div>



            <div class="d-block d-lg-none">
                <section id="slider"
                    class="bg_image slider-element slider-parallax min-vh-40 min-vh-md-100 dark include-header"
                    style="background: url('assets/bg/padar.jpg') no-repeat; background-size: cover;margin-bottom:0px; background-position: center center;">
                    <div class="slider-inner">
                        <div class="vertical-middle slider-element-fade">
                            <div class="container-fluid py-5">
                                <div class="heading-block text-center border-bottom-0 mt-6 mt-md-0" style="">

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @else
            {{-- <div class=" d-block d-lg-none"> --}}
            <section id="slider"
                class="bg_image slider-element slider-parallax min-vh-40 min-vh-md-100 dark include-header"
                style="background: url(@yield('cover')) no-repeat; background-size: cover;margin-bottom:0px; background-position: center center;">
                <div class="slider-inner">
                    <div class="vertical-middle slider-element-fade">
                        <div class="container-fluid py-5">
                            <div class="heading-block text-center border-bottom-0 mt-6 mt-md-0" style="">

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <style>
                /* Mengatur kecerahan background gambar menjadi 60% */
                .bg_image {
                    filter: brightness(60%);
                }
            </style>
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





        <section>

            @yield('content')
        </section>

        {{ view('user.footer') }}

    </div><!-- #wrapper end -->


    <div class="whatsapp-button">
        <a href="https://wa.me/<?= str_replace('+', '', getOption('cs_phone')) ?>?text=Halo, saya ingin diskusi mengenai paket layanan East Pearl."
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
                loop: false,
            });
        });
    </script>
    @yield('script')

</body>

</html>
