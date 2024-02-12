@extends('user.template')



@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('canvas') }}/css/components/bs-rating.css">
    <link rel="stylesheet" href="{{ url('swiperjs/swiper-bundle.min.css') }}" />
    <style>
        body {
            /* overflow-x: hidden; */
        }

        #home-event-container {
            background-image: url("<?= url('assets/ellipse.png') ?>");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 100px;
            padding-bottom: 100px;
        }

        @media (max-width: 760px) {
            #home-event-container {
                background-size: cover;
                height: 23em;
                /* padding-top: 100px !important; */
                /* padding-bottom: 10px; */
                /* margin-top: 0rem; */
                display: inline;
            }
        }
    </style>
    <!-- Demo styles -->
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

        @media (max-width: 760px) {
            .swiper-slide img {
                /* display: block; */
                width: 100px !important;
                height: 10rem !important;
            }
        }
    </style>
@endsection

@section('cover')
    <?= url('assets/bg/stasiun.png') ?>
@endsection

@section('content')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-26YC4R3P36"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-26YC4R3P36');
    </script>

    {{-- css event --}}
    <style>
        #but_event {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .title_event {
            font-size: 28px;
            font-weight: 600;
        }

        .subt_event {
            font-size: 14px;

        }

        .entry-title h3 {
            max-height: 3em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .entry-meta a {
            max-height: 3em;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .owl-carousel .owl-dots .owl-dot {
            background-color: #676565;

        }

        @media (max-width: 760px) {

            #but_event {
                width: 8rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: -3rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;

            }

            .title_event {
                font-size: 16px;
                font-weight: 999;
                margin-bottom: 1.5rem;
                margin-top: -5% !important;
            }

            .owl-carousel .owl-dots .owl-dot {
                background-color: #676565;
                width: 0.7em;
                height: 0.7em;
            }



        }
    </style>
    @php
        $sortedEvents = $events->sortByDesc('start_date');
    @endphp


    {{-- end css event --}}
    <div id="home-event-container" class="d-none d-md-block">
        <div class=" container-fluid mt-md-0" style="margin-top: -4rem !important;">
            <p class=" text-center title_event">
                Discover All of Indonesia’s Treasures with Us, Better than Anyone Else!
            </p>
            <p class=" text-center subt_event" style="margin-top: -1rem;">
                Tentukan pilihan Open Trip atau Private Trip
                ke destinasi wisata alam di Labuan Bajo.
                Tour Experts kami selalu siap untuk mengurus perjalan liburan dari awal hingga akhir. Sehingga kamu
                mendapatkan pengalaman unik tak terlupakan selama mengeksplorasi keindahan Labuan Bajo.

            </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="home-event-container" class="d-block d-md-none">
        <div class=" container-fluid mt-md-0" style="margin-top: -4rem !important;">
            <p class=" text-center title_event">
                Discover All of Indonesia’s Treasures with Us, Better than Anyone Else!
            </p>
            <p class=" text-center subt_event">
                Tentukan pilihan Open Trip atau Private Trip
                ke destinasi wisata alam di Labuan Bajo.
                Tour Experts kami selalu siap untuk mengurus perjalan liburan dari awal hingga akhir. Sehingga kamu
                mendapatkan pengalaman unik tak terlupakan selama mengeksplorasi keindahan Labuan Bajo.
            </p>
        </div>
        <div class="clearfix"></div>
    </div>

    {{-- css wisata --}}
    <style>
        #but_wisata {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .image-caption {
            font-size: 22px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            /* Adjust the background color and opacity */
            padding: 1.5rem;
            backdrop-filter: blur(5px);
            /* Adjust the blur amount */
        }

        .image-caption p {
            color: white;
            margin: 0;
        }

        .mySwiper2 {
            margin-top: 1rem;
            height: 20rem;
            width: 100%;
            /* Ubah lebar menjadi 100% agar responsif */
        }

        .mySwiper2 img {
            height: 20rem;
            width: 100%;
            /* Ubah lebar menjadi 100% agar sesuai dengan ukuran container */
        }

        #top_wisata {
            margin-top: 0;
            /* Hapus margin-top negatif */
        }

        .top_wisata {
            position: relative;
            margin-top: -80px;
        }

        @media (max-width: 760px) {
            .top_wisata {
                position: static;
                margin-top: 0px;
            }
        }

        @media only screen and (min-width: 200px) and (max-width: 767px) {
            .mySwiper2-mobile {
                /* margin-left:-20%; */
            }

            #top_wisata {
                margin-top: 5rem;
                margin-bottom: -0.5rem;
                margin-bottom: -0.3rem;

            }

            #but_wisata {
                width: 8rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: 2rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;

            }

            .image-caption {
                font-size: 12px;
                position: absolute;
                bottom: -2px;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.3);
                /* Adjust the background color and opacity */
                padding: 5px;
                backdrop-filter: blur(10px);
                /* Adjust the blur amount */
            }

            .image-caption p {
                color: white;
                margin: 0;
            }

            .title_wisata {
                font-size: 16px;
                font-weight: 999;
            }

            .mySwiper2 {
                margin-top: 1rem;
                height: 10rem;
                width: 101%;
            }

            .mySwiper2 img {
                height: 10rem;
                width: cover;
            }

        }
    </style>
    {{-- end css wisata --}}
    <div class="container top_wisata">
        <div class="d-none d-md-block">
            <div class="row mb-5">
                <div class="text-center">
                    <p class="" style="font-size: 28px; font-weight: 600;">
                        <b>Paket Open Trip & Private Trip di Labuan Bajo
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none">
            <div class="container text-center" style="margin-top: -6rem;">
                <p class="" style="font-size: 16px; font-weight: 600;">
                    <b>Paket Open Trip & Private Trip di Labuan Bajo
                    </b>
                </p>
            </div>
        </div>
        <!-- Swiper -->
        <div class="px-4 d-none d-md-block">
            <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="0" data-pagi="true"
                data-items="2" data-items-md="2" data-items-lg="3" data-items-xl="3">
                @foreach ($culiners as $culiner)
                    <div class="oc-item">
                        <article class="entry event p-3">
                            <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                style="height: 12rem;">
                                <div class="col-12 mb-md-0">
                                    <a href="{{ url('kuliner') }}" class="entry-image">
                                        <img src='{{ url("assets/kuliner/$culiner->picture") }}' alt="{{ $culiner->name }}"
                                            class="rounded-2" style="max-height: 20rem;">
                                    </a>
                                </div>
                                <div class="image-caption text-center"
                                    style="background: #000000 transparent; color: #ddd; ">
                                    @if (App::isLocale('id'))
                                        <b style="font-weight: 800;">{{ $culiner->name }}</b>
                                    @else
                                        <b style="font-weight: 800;">{{ $culiner->name_en }}</b>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>

        <swiper-container class="mySwiper2 mySwiper2-mobile d-block d-md-none " id="mySwiper" effect="coverflow"
            grab-cursor="true" centered-slides="true" slides-per-view="3" coverflow-effect-rotate="30"
            coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
            coverflow-effect-slide-shadows="true" loop="true">
            @foreach ($tours as $tour)
                <swiper-slide class="card">
                    <a href="/wisata" style="text-decoration: none; color: white;">
                        <img src='{{ url("assets/wisata/$tour->picture") }}' />
                        <div class="image-caption">
                            @if (App::isLocale('id'))
                                <b style="font-weight: 800;">{{ $tour->name }}</b>
                            @else
                                <b style="font-weight: 800;">{{ $tour->name_en }}</b>
                            @endif
                        </div>
                    </a>
                </swiper-slide>
            @endforeach

        </swiper-container>

        {{-- <swiper-container class="mySwiper2 mySwiper2-mobile d-block d-md-none " id="mySwiper" effect="coverflow"
            grab-cursor="true" centered-slides="true" slides-per-view="3" coverflow-effect-rotate="30"
            coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
            coverflow-effect-slide-shadows="true" loop="true">
            @foreach ($tours as $tour)
                <swiper-slide class="card">
                    <a href="/wisata" style="text-decoration: none; color: white;">
                        <img src='{{ url("assets/wisata/$tour->picture") }}' />
                        <div class="image-caption">
                            @if (App::isLocale('id'))
                                <b style="font-weight: 800;">{{ $tour->name }}</b>
                            @else
                                <b style="font-weight: 800;">{{ $tour->name_en }}</b>
                            @endif
                        </div>
                    </a>
                </swiper-slide>
            @endforeach

        </swiper-container> --}}

        <div class="d-block d-md-none">
            <div class="container text-center">
                <a href="{{ url('wisata') }}" class="btn btn-primary text-white bg-btn-visit" id="but_wisata">
                    {{ __('home.explore_all') }} {{ __('home.title_destinations') }}
                    <i class="bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- css kuliner --}}
    <style>
        .top_kuliner {
            margin-top: 6rem;
        }

        #but_kuliner {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .kuliner_caption .image-caption {

            font-size: 20px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            /* Adjust the background color and opacity */
            padding: 0.5rem;
            backdrop-filter: blur(5px);
            /* Adjust the blur amount */
        }

        .image-caption p {
            color: white;
            margin: 0;

        }

        @media (max-width: 760px) {
            #but_kuliner {
                width: 8rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: -1.5rem;
                margin-bottom: -4rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            .title_kuliner {
                font-size: 16px;
                font-weight: 999;
            }

            #top_kuliner {
                margin-top: -3rem;
            }

            .event {
                width: 16.5rem;
                /* height: 100%; */
                margin: auto;
            }

            .kuliner .owl-carousel .owl-dots .owl-dot {
                margin-top: -3rem;
            }
        }
    </style>
    {{-- end css kuliner --}}

    <div class="container">
        <div class="d-none d-md-block px-4">
            <div class="row mb-5 top_kuliner">
                <div class="col-md-7">
                    <h1 class="mb-1 ">
                        <b>TOP {{ __('home.title_culinaries') }}</b>
                    </h1>
                    <div class="text-lg fs-4 mb-4">
                        {{ __('home.subtitle_culinaries') }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mt-5">
                        <a href="{{ url('kuliner') }}" class="btn btn-primary btn-lg  float-end text-white bg-btn-visit"
                            id="but_kuliner">
                            {{ __('home.explore_all') }} {{ __('home.title_culinaries') }}
                            <i class="bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="px-4">
                    <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="0"
                        data-pagi="true" data-items="2" data-items-md="2" data-items-lg="3" data-items-xl="3">
                        @foreach ($culiners as $culiner)
                            <div class="oc-item">
                                <article class="entry event p-3">
                                    <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                        style="height: 12rem;">
                                        <div class="col-12 mb-md-0">
                                            <a href="{{ url('kuliner') }}" class="entry-image">
                                                <img src='{{ url("assets/kuliner/$culiner->picture") }}'
                                                    alt="{{ $culiner->name }}" class="rounded-2"
                                                    style="max-height: 20rem;">
                                            </a>
                                        </div>
                                        <div class="image-caption text-center"
                                            style="background: #000000 transparent; color: #ddd; ">
                                            @if (App::isLocale('id'))
                                                <b style="font-weight: 800;">{{ $culiner->name }}</b>
                                            @else
                                                <b style="font-weight: 800;">{{ $culiner->name_en }}</b>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="d-block d-md-none kuliner">
            <div class="container text-center" id="top_kuliner">
                <b class="h1 title_kuliner">TOP {{ strtoupper(__('home.title_culinaries')) }}</b>
                <br>
                <div style="font-size:10px">
                    {{ __('home.subtitle_culinaries') }}
                </div>
            </div>
            <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="1" data-pagi="true"
                data-items="1" data-items-md="2" data-items-lg="3" data-items-xl="3">
                @foreach ($culiners as $culiner)
                    <div class="oc-item">
                        <article class="entry event p-3">
                            <div
                                class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm">
                                <div class=" col-12" style="height: 8.5rem;">
                                    <a href="{{ url('kuliner') }}" class="">
                                        <img src="{{ url('assets/kuliner/' . $culiner->picture) }}" class="rounded-2">
                                        <div class="image-caption text-center"
                                            style="background: #000000 transparent; color: #ddd; ">
                                            @if (App::isLocale('id'))
                                                <b style="font-weight: 800;">{{ $culiner->name }}</b>
                                            @else
                                                <b style="font-weight: 800;">{{ $culiner->name_en }}</b>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="container mt-5 text-center">
                <a href="{{ url('kuliner') }}" class="btn btn-primary text-white bg-btn-visit" id="but_kuliner">
                    {{ __('home.explore_all') }} {{ __('home.title_culinaries') }}
                    <i class="bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- Cafe & Resto --}}
    <style>
        .top_cafe {
            margin-top: 3rem;
        }

        #but_cafe {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .cafe_caption .image-caption {

            font-size: 20px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            /* Adjust the background color and opacity */
            padding: 0.5rem;
            backdrop-filter: blur(5px);
            /* Adjust the blur amount */
        }

        .cafe_caption .entry-image {
            height: 220px;
        }

        .image-caption p {
            color: white;
            margin: 0;

        }

        @media (max-width: 760px) {
            #but_cafe {
                width: 9rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: -3rem;
                margin-bottom: -4rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            .cafe_caption .image-caption {

                font-size: 12px;
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.3);
                /* Adjust the background color and opacity */
                border-radius: 0px 0px 10px 10px !important;
                padding: 0.5rem;
                backdrop-filter: blur(5px);
                /* Adjust the blur amount */
            }

            .title_cafe {
                font-size: 16px;
                font-weight: 999;
            }

            #top_cafe {
                margin-top: 6rem;
            }

            .event {
                width: 16.5rem;
                /* height: 100%; */
                margin: auto;
            }

            .cafe .owl-carousel .owl-dots .owl-dot {
                margin-top: 2rem;
            }
        }
    </style>

    <div class="container">
        <div class="d-none d-md-block px-4">
            <div class="row mb-5 top_cafe">
                <div class="col-md-7">
                    <h1 class="mb-1 ">
                        <b>TOP {{ __('home.title_cafe') }}</b>
                    </h1>
                    <div class="text-lg fs-4 mb-4">
                        {{ __('home.subtitle_cafe') }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mt-5">
                        <a href="{{ url('kuliner?cafe_resto=1&keyword=') }}"
                            class="btn btn-primary btn-lg  float-end text-white bg-btn-visit" id="but_cafe">
                            {{ __('home.explore_all') }} {{ __('home.title_cafe') }}
                            <i class="bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="px-4">
                    <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="0"
                        data-pagi="true" data-items="2" data-items-md="2" data-items-lg="3" data-items-xl="3">
                        @foreach ($cafe as $cf)
                            <div class="oc-item">
                                <article class="entry event p-3">
                                    <div
                                        class="cafe_caption grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow ">
                                        <div class="col-12 mb-md-0">
                                            <a href="{{ url('kuliner?cafe_resto=1&keyword=') }}" class="entry-image">
                                                <img src="{{ url('assets/kuliner/' . $cf->cover_picture) }}"
                                                    class="" style="height: 15rem;">
                                            </a>
                                        </div>
                                        <div class="image-caption text-center"
                                            style="background: #000000 transparent; color: #ddd; ">
                                            @if (App::isLocale('id'))
                                                <b style="font-weight: 800;">{{ $cf->name }}</b>
                                            @else
                                                <b style="font-weight: 800;">{{ $cf->name_en }}</b>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="d-block d-md-none cafe">
            <div class="container text-center" id="top_cafe">
                <b class="h1 title_cafe">TOP {{ strtoupper(__('home.title_cafe')) }}</b>
                <br>
                <div style="font-size:10px">
                    {{ __('home.subtitle_cafe') }}
                </div>
            </div>
            <div id="oc-images" class="owl-carousel image-carousel  carousel-widget mt-3 mb-6" data-items-xs="2"
                data-items-sm="2" data-items-lg="3" data-items-xl="5" data-autoplay="3000" data-loop="true">
                @foreach ($cafe as $cf)
                    <div class="oc-item cafe_caption">
                        <a href="{{ url('kuliner?cafe_resto=1&keyword=') }}"><img
                                src="{{ url('assets/kuliner/' . $cf->cover_picture) }}" alt="Image 1"
                                style="border-radius: 10px 10px 10px 10px !important; height: 10rem; width: 20rem;"></a>
                        <div class="image-caption text-center" style="background: #000000 transparent; color: #ddd; ">
                            @if (App::isLocale('id'))
                                <b style="font-weight: 800;">{{ $cf->name }}</b>
                            @else
                                <b style="font-weight: 800;">{{ $cf->name_en }}</b>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container  text-center">
                <a href="{{ url('kuliner?cafe_resto=1&keyword=') }}" class="btn btn-primary text-white bg-btn-visit"
                    id="but_cafe">
                    {{ __('home.explore_all') }} {{ __('home.title_cafe') }}
                    <i class="bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- css oleh-oleh --}}
    <style>
        .top_souvenir {
            margin-top: 3rem;
        }

        #but_souvenir {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .souvenir_caption .image-caption {

            font-size: 20px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            /* Adjust the background color and opacity */
            padding: 0.5rem;
            backdrop-filter: blur(5px);
            /* Adjust the blur amount */
        }

        .image-caption p {
            color: white;
            margin: 0;

        }

        @media (max-width: 760px) {
            #but_souvenir {
                width: 8rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: -1.5rem;
                margin-bottom: -4rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            .title_souvenir {
                font-size: 16px;
                font-weight: 999;
            }

            #top_souvenir {
                margin-top: 6rem;
            }

            .event {
                width: 16.5rem;
                /* height: 100%; */
                margin: auto;
            }

            .souvenir .owl-carousel .owl-dots .owl-dot {
                margin-top: -3rem;
            }

            .grid-img-card-souvenir {
                height: 8rem !important;
            }
        }
    </style>
    {{-- end css oleh-oleh --}}



    <div class="container mb-3 mb-md-0">
        <div class="d-none d-md-block px-4">
            <div class="row mb-5 top_souvenir">
                <div class="col-md-7">
                    <h1 class="mb-1 ">
                        <b>TOP {{ __('home.title_souvenirs') }}</b>
                    </h1>
                    <div class="text-lg fs-4 mb-4">
                        {{ __('home.subtitle_souvenirs') }}
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mt-5">
                        <a href="{{ url('oleh-oleh') }}" class="btn btn-primary btn-lg float-end text-white bg-btn-visit"
                            id="but_souvenir">
                            {{ __('home.explore_all') }} {{ __('home.title_souvenirs') }}
                            <i class="bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <div class="px-4">
                    <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="0"
                        data-pagi="true" data-items="2" data-items-md="2" data-items-lg="3" data-items-xl="3">
                        @foreach ($souvenirs as $souvenir)
                            <div class="oc-item">
                                <article class="entry event p-3">
                                    <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm souvenir_caption"
                                        style="height: 12rem;">
                                        <div class="col-12 mb-md-0">
                                            <a href="{{ url('oleh-oleh') }}" class="entry-image">
                                                <img src='{{ url("assets/oleh-oleh/$souvenir->picture") }}'
                                                    alt="{{ $souvenir->name }}" class="rounded-2"
                                                    style="max-height: 20rem;">
                                            </a>
                                        </div>
                                        <div class="image-caption text-center"
                                            style="background: #000000 transparent; color: #ddd; ">
                                            @if (App::isLocale('id'))
                                                <b style="font-weight: 800;">{{ $souvenir->name }}</b>
                                            @else
                                                <b style="font-weight: 800;">{{ $souvenir->name_en }}</b>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="d-block d-md-none souvenir">
            <div class="container text-center" id="top_souvenir">
                <b class="h1 title_souvenir">TOP {{ strtoupper(__('home.title_souvenirs')) }}</b>
                <br>
                <div style="font-size:10px">
                    {{ __('home.subtitle_souvenirs') }}
                </div>
            </div>
            <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="1" data-pagi="true"
                data-items="1" data-items-md="2" data-items-lg="3" data-items-xl="3">
                @foreach ($souvenirs as $souvenir)
                    <div class="oc-item">
                        <article class="entry event p-3">
                            <div
                                class="grid-inner grid-inner-souvenir bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm">
                                <div class="col-12">
                                    <a href="{{ url('oleh-oleh') }}" class="grid-card-souvenir">
                                        <img src="{{ url('assets/oleh-oleh/' . $souvenir->picture) }}"
                                            class="rounded-2 grid-img-card-souvenir">
                                        <div class="image-caption text-center"
                                            style="background: #000000 transparent; color: #ddd; ">
                                            @if (App::isLocale('id'))
                                                <b style="font-weight: 800;">{{ $souvenir->name }}</b>
                                            @else
                                                <b style="font-weight: 800;">{{ $souvenir->name_en }}</b>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="container mt-5 text-center">
                <a href="{{ url('oleh-oleh') }}" class="btn btn-primary text-white bg-btn-visit" id="but_kuliner">
                    {{ __('home.explore_all') }} {{ __('home.title_souvenirs') }}
                    <i class="bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

    </div>

    {{-- css akomodasi --}}
    <style>
        .top_akomodasi {
            margin-top: -1rem;
        }

        #but_akomodasi {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        @media (max-width: 760px) {
            #but_akomodasi {
                width: 9rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-top: 2rem;
                margin-bottom: -4rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            .top_akomodasi {
                margin-top: 6rem;
            }

            .image-caption-akomodasi {
                font-size: 12px;
                text-align: center;
            }

            .title_akomodasi {
                font-size: 16px;
                font-weight: 999;
            }

        }
    </style>
    {{-- end css akomodasi --}}

    <div class="top_akomodasi">
        <div class="container mt-4">
            <div class="d-none d-md-block ">
                <div class="row mb-5">
                    <div class="col-md-7">
                        <h1 class="mb-1">
                            <b>TOP {{ __('home.title_accommodations') }}</b>
                        </h1>
                        <div class="text-lg fs-4">
                            {{ __('home.subtitle_accommodations') }}
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="mt-5">
                            <a href="{{ url('akomodasi') }}"
                                class="btn btn-primary btn-lg  float-end text-white bg-btn-visit" id="but_akomodasi">
                                {{ __('home.explore_all') }} {{ __('home.title_accommodations') }}
                                <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-md-none">
                <div class="container text-center">
                    <b class="h1 title_akomodasi">TOP {{ strtoupper(__('home.title_accommodations')) }}</b>
                    <br>
                    <div style="font-size:10px">
                        {{ __('home.subtitle_accommodations') }}
                    </div>
                </div>
            </div>
            <!-- Swiper -->
            <swiper-container class="mySwiper2 d-none d-md-block" id="mySwiper" effect="coverflow" grab-cursor="true"
                centered-slides="true" slides-per-view="2" coverflow-effect-rotate="30" coverflow-effect-stretch="0"
                coverflow-effect-depth="100" coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true"
                loop="true" style="margin-top: -2rem;">
                @foreach ($accomodations as $accomodation)
                    <swiper-slide class="card">
                        <a href="/akomodasi" style="text-decoration: none; color: white;">
                            <img src='{{ url("assets/akomodasi/$accomodation->picture") }}' />
                            <div class="image-caption">
                                @if (App::isLocale('id'))
                                    <b style="font-weight: 800;">{{ $accomodation->name }}</b>
                                @else
                                    <b style="font-weight: 800;">{{ $accomodation->name_en }}</b>
                                @endif
                            </div>
                        </a>
                    </swiper-slide>
                @endforeach

            </swiper-container>
            <swiper-container class="mySwiper2 mySwiper2-mobile d-block d-md-none " id="mySwiper" effect="coverflow"
                grab-cursor="true" centered-slides="true" slides-per-view="3" coverflow-effect-rotate="30"
                coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
                coverflow-effect-slide-shadows="true" loop="true">
                @foreach ($accomodations as $accomodation)
                    <swiper-slide class="card">
                        <a href="/akomodasi" style="text-decoration: none; color: white;">
                            <img src='{{ url("assets/akomodasi/$accomodation->picture") }}' />
                            <div class="image-caption">
                                @if (App::isLocale('id'))
                                    <b style="font-weight: 800;">{{ $accomodation->name }}</b>
                                @else
                                    <b style="font-weight: 800;">{{ $accomodation->name_en }}</b>
                                @endif
                            </div>
                        </a>
                    </swiper-slide>
                @endforeach

            </swiper-container>
        </div>

        <div class="d-block d-md-none">
            <div class="container text-center">
                <a href="{{ url('akomodasi') }}" class="btn btn-primary text-white bg-btn-visit" id="but_akomodasi">
                    {{ __('home.explore_all') }} {{ __('home.title_accommodations') }}
                    <i class="bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- css layanan --}}
    <style>
        .layanan {
            margin-top: 12rem;
        }

        #but_layanan {
            width: 30rem;
            height: 5rem;
            font-size: 22px;
            font-weight: 500;
            margin-top: 0.5rem;
            margin-bottom: -8rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        @media (max-width: 760px) {
            .layanan {
                margin-top: 12.5rem;
            }

            #but_layanan {
                width: 8rem;
                height: 40px;
                font-size: 12px;
                font-weight: 500;
                margin-top: -1.5rem;
                margin-bottom: -10rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

            .teks_layanan {
                font-size: 10px;
            }

            .title_layanan {
                font-size: 16px;
                font-weight: 999;
            }

            .img_layanan {
                width: 150px;
            }

        }
    </style>
    {{-- end css layanan --}}

    <div class="layanan">
        <div class="container mt-5 " id="service-floating-card">
            <div class=" container text-center mb-5 d-none d-md-block px-4">
                <b class="h1">{{ __('home.title_service_products') }}</b>
                <br>
                <div class="teks_layanan fs-4 mb-2" style="font-size:12px; margin-top: 1rem; margin-bottom: -2rem;">
                    {{ __('home.subtitle_service_products') }}
                </div>
            </div>
            <div class=" container text-center d-block d-md-none">
                <b class="h1 title_layanan">{{ strtoupper(__('home.title_service_products')) }}</b>
                <br>
                <div class="teks_layanan" style="font-size:10px; margin-bottom: -2rem;">
                    {{ __('home.subtitle_service_products') }}
                </div>
            </div>
            <div class="row justify-content-center mt-5 mb-5">
                <div class="col-4 text-center">
                    <a href="/layanan-produk/tourism-card">
                        <img src="{{ url('assets/layanan-produk/TCardIcon.png') }}" class="img-fluid img_layanan"
                            width="200px">
                        <br>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="/layanan-produk">
                        <img src="{{ url('assets/layanan-produk/TPackIcon.png') }}" class="img-fluid img_layanan"
                            width="200px">
                        <br>
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="/layanan-produk">
                        <img src="{{ url('assets/layanan-produk/paketOlehIcon.png') }}" class="img-fluid img_layanan"
                            width="200px">
                        <br>
                    </a>
                </div>
            </div>

            <div class="container mt-5 text-center  d-none d-md-none">
                <a href="{{ url('layanan-produk') }}" class="btn btn-primary text-white bg-btn-visit" id="but_layanan">
                    {{ __('home.explore_all') }}

                    <i class="bi-arrow-right "></i>
                </a>
            </div>
            <div class="container mt-5 text-center  d-none d-md-none">
                <a href="{{ url('layanan-produk') }}" class="btn btn-primary text-white bg-btn-visit" id="but_layanan">
                    {{ __('home.explore_all') }}

                    <i class="bi-arrow-right ms-2   "></i>
                </a>
            </div>
        </div>
    </div>

    {{-- css berita --}}
    <style>
        .top_berita {
            margin-top: -3rem !important;
        }

        #but_berita {
            width: 12rem;
            height: 40px;
            font-size: 12px;
            font-weight: 500;
            margin-top: -10rem;
            margin-bottom: 5rem;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        @media (max-width: 760px) {
            .top_berita {
                margin-top: -6rem !important;
            }

            .title_berita {
                font-size: 16px;
                font-weight: 999;
            }

            #but_berita {
                width: 8rem;
                height: 30px;
                font-size: 10px;
                font-weight: 500;
                margin-bottom: 5rem;
                margin-top: -11rem;
                margin-left: auto;
                margin-right: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 5px;
            }

        }
    </style>
    {{-- end css berita --}}

    <div class="container-fluid mt-lg-6 top_berita px-4">
        <div class="row mb-lg-6  d-none d-md-block px-4">
            <div class="col-md-12 text-center">
                <h1 class="mb-5">
                    <b>{{ __('home.title_news') }}</b>
                </h1>
            </div>
        </div>
        <div class="row mb-lg-6  d-block d-md-none mb-5">
            <div class="col-md-12 text-center">
                <h1 class="mb-5 title_berita">
                    <b>{{ strtoupper(__('home.title_news')) }}</b>
                </h1>
            </div>
        </div>
        <div class="row gx-5 col-mb-80">
            <div class="postcontent col-lg-12">
                <div id="posts" class="row gutter-40 mb-5" style="margin-top: -5rem;">
                    <div class="entry col-12">
                        <div class="grid-inner row g-0">
                            <div class="col-md-4">
                                <div class="entry-image rounded-2">
                                    <a href='{{ url("assets/berita/{$news[0]->cover_picture}") }}'
                                        data-lightbox="image"><img
                                            src='{{ url("assets/berita/{$news[0]->cover_picture}") }}'
                                            alt="{{ $news[0]->name }}"></a>
                                </div>
                            </div>
                            <div class="col-md-8 ps-md-4">
                                <div class="entry-title title-sm">
                                    <h2>
                                        <a href="{{ url("/detail-berita/{$news[0]->slug}") }}">
                                            @if (App::isLocale('id'))
                                                {{ $news[0]->name }}
                                            @else
                                                {{ $news[0]->name_en }}
                                            @endif
                                        </a>
                                    </h2>
                                </div>
                                @if (App::isLocale('id'))
                                    <div class="entry-meta">
                                        <ul>
                                            <li>
                                                <i class="uil uil-schedule"></i>
                                                {{ tglIndo($news[0]->published_date, 'd/m/Y') }}
                                            </li>
                                            <li><i class="uil uil-user"></i> {{ $news[0]->admin_name }}</li>
                                            <li><i class="uil uil-folder-open"></i>{{ $news[0]->category_name }}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1">
                                        {!! mb_substr(nl2br($news[0]->content), 0, 450) !!}
                                        <br>
                                        <a href="{{ url("/detail-berita/{$news[0]->slug}") }}"
                                            class="more-link">{{ __('home.continue_reading') }}</a>
                                    </div>
                                @else
                                    <div class="entry-meta">
                                        <ul>
                                            <li>
                                                <i class="uil uil-schedule"></i>
                                                {{ date('d-m-Y', strtotime($news[0]->published_date)) }}
                                            </li>
                                            <li>
                                                <i class="uil uil-user"></i>
                                                {{ $news[0]->admin_name }}
                                            </li>
                                            <li>
                                                <i class="uil uil-folder-open"></i>
                                                {{ $news[0]->category_name_en }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1" style="margin-top: -0rem; margin-bottom: 1rem">
                                        {!! mb_substr(nl2br($news[0]->content_en), 0, 450) !!}
                                        <br>
                                        <a href="{{ url("/detail-berita/{$news[0]->slug}") }}" class="more-link">
                                            {{ __('home.continue_reading') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="entry col-12">
                        <div class="grid-inner row g-0" style="margin-top: -5rem;">
                            <div class="col-md-4 order-md-last">
                                <div class="entry-image">
                                    <a href="{{ url("assets/berita/{$news[1]->cover_picture}") }}"
                                        data-lightbox="image"><img
                                            src="{{ url("assets/berita/{$news[1]->cover_picture}") }}"
                                            alt="{{ $news[1]->name }}"></a>
                                </div>
                            </div>
                            <div class="col-md-8 pe-md-4">
                                <div class="entry-title title-sm">
                                    <h2><a href="{{ url("/detail-berita/{$news[1]->slug}") }}">
                                            @if (App::isLocale('id'))
                                                {{ $news[1]->name }}
                                            @else
                                                {{ $news[1]->name_en }}
                                            @endif
                                        </a>
                                    </h2>
                                </div>
                                @if (App::isLocale('id'))
                                    <div class="entry-meta">
                                        <ul>
                                            <li>
                                                <i class="uil uil-schedule"></i>
                                                {{ tglIndo($news[1]->published_date, 'd/m/Y') }}
                                            </li>
                                            <li><i class="uil uil-user"></i> {{ $news[1]->admin_name }}</li>
                                            <li><i class="uil uil-folder-open"></i>{{ $news[1]->category_name }}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1" style="margin-top: -0rem; margin-bottom: 1rem">
                                        {!! mb_substr(nl2br($news[1]->content), 0, 450) !!}
                                        <br>
                                        <a href="{{ url("/detail-berita/{$news[1]->slug}") }}"
                                            class="more-link">{{ __('home.continue_reading') }}</a>
                                    </div>
                                @else
                                    <div class="entry-meta">
                                        <ul>
                                            <li>
                                                <i class="uil uil-schedule"></i>
                                                {{ date('d-m-Y', strtotime($news[1]->published_date)) }}
                                            </li>
                                            <li>
                                                <i class="uil uil-user"></i>
                                                {{ $news[1]->admin_name }}
                                            </li>
                                            <li>
                                                <i class="uil uil-folder-open"></i>
                                                {{ $news[1]->category_name_en }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1" style="margin-top: -0rem; margin-bottom: 1rem">
                                        {!! mb_substr(nl2br($news[1]->content_en), 0, 450) !!}
                                        <br>
                                        <a href="{{ url("/detail-berita/{$news[1]->slug}") }}" class="more-link">
                                            {{ __('home.continue_reading') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="entry col-12">
                        <div class="grid-inner row g-0" style="margin-top: -5rem;">
                            <div class="col-md-4">
                                <div class="entry-image">
                                    <a href='{{ url("assets/berita/{$news[2]->cover_picture}") }}'
                                        data-lightbox="image"><img
                                            src='{{ url("assets/berita/{$news[2]->cover_picture}") }}'
                                            alt="{{ $news[2]->name }}"></a>
                                </div>
                            </div>
                            <div class="col-md-8 ps-md-4">
                                <div class="entry-title title-sm">
                                    <h2><a href="{{ url("/detail-berita/{$news[2]->slug}") }}">
                                            @if (App::isLocale('id'))
                                                {{ $news[2]->name }}
                                            @else
                                                {{ $news[2]->name_en }}
                                            @endif
                                        </a>
                                    </h2>
                                </div>
                                @if (App::isLocale('id'))
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="uil uil-schedule"></i>
                                                {{ tglIndo($news[2]->published_date, 'd/m/Y') }}</li>
                                            <li><i class="uil uil-user"></i> {{ $news[2]->admin_name }}</li>
                                            <li><i class="uil uil-folder-open"></i>{{ $news[2]->category_name }}</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1" style="margin-top: -0rem;">
                                        {!! mb_substr(nl2br($news[2]->content), 0, 450) !!}
                                        <br>
                                        <a href="{{ url("/detail-berita/{$news[2]->slug}") }}"
                                            class="more-link">{{ __('home.continue_reading') }}</a>
                                    </div>
                                @else
                                    <div class="entry-meta">
                                        <ul>
                                            <li>
                                                <i class="uil uil-schedule"></i>
                                                {{ date('d-m-Y', strtotime($news[2]->published_date)) }}
                                            </li>
                                            <li>
                                                <i class="uil uil-user"></i>
                                                {{ $news[2]->admin_name }}
                                            </li>
                                            <li>
                                                <i class="uil uil-folder-open"></i>
                                                {{ $news[2]->category_name_en }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content mt-1" style="margin-top: -0rem;">
                                        {!! mb_substr(nl2br($news[2]->content_en), 0, 450) !!}
                                        <br>
                                        <a href="{{ url('/detail-berita/' . $news[2]->slug) }}" class="more-link">
                                            {{ __('home.continue_reading') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 text-center" style="z-index:1000;position:relative;">
        <a href="{{ url('/berita') }}" class="btn btn-primary text-white bg-btn-visit" id="but_berita">
            {{ __('home.explore_all') }} {{ __('home.title_news_general') }}
            <i class="bi-arrow-right ms-2"></i>
        </a>
    </div>


    {{-- <div class="container mt-lg-6">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-12">
                <div class="owl-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-items="1"
                    data-items-md="3" data-autoplay="5000">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-383px, 0px, 0px); transition: all 0.25s ease 0s; width: 1149px;">
                            <div class="owl-item" style="width: 363px; margin-right: 20px;">
                                <div class="p-2">
                                    <div class="card text-center rounded-6 shadow-sm overflow-hidden">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="rounded-circle mx-auto w-auto mb-4"
                                                        src="{{ url('assets/profil/user_default.png') }}" width="64"
                                                        height="64" alt="Customer Testimonails">
                                                    <div
                                                        class="rating-container theme-krajee-svg rating-md rating-animate">
                                                        <div class="rating-stars" tabindex="0"><span
                                                                class="empty-stars"><span class="star"
                                                                    title="One Star"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Two Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Three Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Four Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Five Stars"><span
                                                                        class="bi-star"></span></span></span><span
                                                                class="filled-stars" style="width: 100%;"><span
                                                                    class="star" title="One Star"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Two Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Three Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Four Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Five Stars"><span
                                                                        class="bi-star-fill"></span></span></span></div>
                                                    </div>
                                                    <p class="mb-4 font-secondary"
                                                        style="font-size: 1.125rem; line-height: 1.65;">Pelayanan yang
                                                        bagus, cepat, dan dapat dipercaya. Senang bisa menggunakan produk
                                                        tourism card, membantu segala hal dalam kuliner,wisata, dan oleh
                                                        oleh</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 fw-medium">Yusuf</h4>
                                                        <small class="text-muted">yusuf123@gmail.com</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-icon bi-star-fill op-02"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 363px; margin-right: 20px;">
                                <div class="p-2">
                                    <div class="card text-center rounded-6 shadow-sm overflow-hidden">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="rounded-circle mx-auto w-auto mb-4"
                                                        src="{{ url('assets/profil/user_default.png') }}" width="64"
                                                        height="64" alt="Customer Testimonails">
                                                    <div
                                                        class="rating-container theme-krajee-svg rating-md rating-animate">
                                                        <div class="rating-stars" tabindex="0"><span
                                                                class="empty-stars"><span class="star"
                                                                    title="One Star"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Two Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Three Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Four Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Five Stars"><span
                                                                        class="bi-star"></span></span></span><span
                                                                class="filled-stars" style="width: 100%;"><span
                                                                    class="star" title="One Star"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Two Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Three Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Four Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Five Stars"><span
                                                                        class="bi-star-fill"></span></span></span></div>
                                                    </div>
                                                    <p class="mb-4 font-secondary"
                                                        style="font-size: 1.125rem; line-height: 1.65;">Antarmukanya
                                                        sederhana dan user-friendly sehingga mudah digunakan bagi saya
                                                        wisatawan dari luar jawa yang ingin menikmati wisata dan kebudayaan
                                                        disini.</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 fw-medium">Nabila</h4>
                                                        <small class="text-muted">nabila14@gmail.com</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-icon bi-star-fill op-02"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 363px; margin-right: 20px;">
                                <div class="p-2">
                                    <div class="card text-center rounded-6 shadow-sm overflow-hidden">
                                        <div class="card-body p-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <img class="rounded-circle mx-auto w-auto mb-4"
                                                        src="{{ url('assets/profil/user_default.png') }}" width="64"
                                                        height="64" alt="Customer Testimonails">
                                                    <div
                                                        class="rating-container theme-krajee-svg rating-md rating-animate">
                                                        <div class="rating-stars" tabindex="0"><span
                                                                class="empty-stars"><span class="star"
                                                                    title="One Star"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Two Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Three Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Four Stars"><span
                                                                        class="bi-star"></span></span><span class="star"
                                                                    title="Five Stars"><span
                                                                        class="bi-star"></span></span></span><span
                                                                class="filled-stars" style="width: 100%;"><span
                                                                    class="star" title="One Star"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Two Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Three Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Four Stars"><span
                                                                        class="bi-star-fill"></span></span><span
                                                                    class="star" title="Five Stars"><span
                                                                        class="bi-star-fill"></span></span></span></div>
                                                    </div>
                                                    <p class="mb-4 font-secondary"
                                                        style="font-size: 1.125rem; line-height: 1.65;">Asik dan
                                                        menyenangkan sekali menggunakan produk tourism card, bisa
                                                        menggunakannya dengan fleksibel mau ke kuliner, wisata ataupun
                                                        oleh-oleh. Sangat membantu, terima kasih.</p>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <h4 class="h6 mb-0 fw-medium">Arnold</h4>
                                                        <small class="text-muted">arnold22@gmail.com</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-icon bi-star-fill op-02"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                class="uil uil-angle-left-b"></i></button><button type="button" role="presentation"
                            class="owl-next disabled"><i class="uil uil-angle-right-b"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <style>
        .support {
            margin-top: 6rem;
            margin-bottom: 5rem;

        }

        .title_support {
            font-size: var(--cnvs-font-size-h1);
            font-weight: 999;
            margin-bottom: 5rem;

        }

        @media (max-width: 760px) {
            .support {
                margin-bottom: 2rem;
                margin-top: -3rem;
                font-size: 16px;
                font-weight: 999;
            }

            .title_support {
                font-size: 18px;
                font-weight: 999;
                margin-bottom: 1rem !important;

            }
        }
    </style>
    <div class="support" style=" ">
        <h3 class="text-center title_support">{{ __('home.supported_by') }}</h3>
        <div class="container text-center d-none d-md-block">
            <div id="oc-clients" class="owl-carousel image-carousel carousel-widget justify-content-center"
                data-margin="30" data-nav="true" data-pagi="true" data-autoplay="5000" data-items-xs="3"
                data-items-sm="3" data-items-md="6" data-items-lg="6" data-items-xl="6" data-loop="true">
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/bi-3.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disbudpar-cirebon.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disbudpar-kab-cirebon.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/dispora-indramayu.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disporapar-kuningan.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/exotic-majalengka.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/phri.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/grand-tryas.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/tryas.png') }}"></a></div>
                <div class="oc-item align-items-center" style="margin-top: 30px; "><a href="#"><img
                            src="{{ url('assets/wiwarna.png') }}"></a></div>
            </div>
        </div>
        <div class="container text-center d-block d-md-none">
            <div id="oc-clients" class="owl-carousel image-carousel carousel-widget justify-content-center"
                data-margin="30" data-nav="true" data-pagi="true" data-autoplay="5000" data-items-xs="3"
                data-items-sm="3" data-items-md="6" data-items-lg="6" data-items-xl="6" data-loop="true">
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/bi-3.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disbudpar-cirebon.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disbudpar-kab-cirebon.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/dispora-indramayu.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/disporapar-kuningan.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/exotic-majalengka.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/phri.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/grand-tryas.png') }}"></a></div>
                <div class="oc-item align-items-center"><a href="#"><img
                            src="{{ url('assets/sponsor/tryas.png') }}"></a></div>
                <div class="oc-item align-items-center mt-3" style="width: 100px; height: auto;"><a href="#"><img
                            src="{{ url('assets/wiwarna.png') }}"></a></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script></script>
@endsection
