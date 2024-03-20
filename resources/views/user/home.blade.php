@extends('user.template')



@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('canvas') }}/css/components/bs-rating.css">
    <link rel="stylesheet" href="{{ url('swiperjs/swiper-bundle.min.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css">
    <style>
        body {
            /* overflow-x: hidden; */
        }

        #home-event-container {
            /* background-image: url("<?= url('assets/ellipse.png') ?>"); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding-top: 100px;
            padding-bottom: 100px;
            background-color: #f4b8fc;
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
    <?= url('assets/bg/padar.png') ?>
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
    {{-- @php
        $sortedEvents = $events->sortByDesc('start_date');
    @endphp --}}


    {{-- end css event --}}
    <div id="home-event-container" class="d-none d-md-block">
        <div class=" container mt-md-0" style="margin-top: -4rem !important;">
            <p class=" text-center title_event">
                Discover All of Indonesia’s Treasures with Us, Better than Anyone Else!
            </p>
            <p class=" text-center subt_event" style="margin-top: 1rem;">
                Tentukan pilihan Open Trip atau Private Trip
                ke destinasi wisata alam di Labuan Bajo.
                Tour Experts kami selalu siap untuk mengurus perjalan liburan dari awal hingga akhir. Sehingga kamu
                mendapatkan pengalaman unik tak terlupakan selama mengeksplorasi keindahan Labuan Bajo.

            </p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div id="home-event-container" class="d-block d-md-none">
        <div class=" container mt-md-0" style="margin-top: -4rem !important;">
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
    <style>
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url(assets/wave.png);
            /* transform: rotate(180deg); */
            background-size: 1000px 100px;

        }

        .wave.wave1 {
            animation: animate 30s linear infinite;
            z-index: 1000;
            opacity: 1;
            animation-delay: 0s;
            bottom: 0;
        }

        .wave.wave2 {
            animation: animate2 15s linear infinite;
            z-index: 999;
            opacity: 0.5;
            animation-delay: -5s;
            bottom: 10px;
        }

        .wave.wave3 {
            animation: animate 30s linear infinite;
            z-index: 998;
            opacity: 0.2;
            animation-delay: -2s;
            bottom: 15;
        }

        .wave.wave4 {
            animation: animate2 5s linear infinite;
            z-index: 997;
            opacity: 0.7;
            animation-delay: -5s;
            bottom: 20px;
        }


        @keyframes animate {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: 1000px;
            }
        }

        @keyframes animate2 {
            0% {
                background-position-x: 0;
            }

            100% {
                background-position-x: -1000px;
            }
        }
    </style>
    <div style="position: relative; margin-top: 40px;">
        <div class="wave wave1">

        </div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
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
            margin-top: 0px;
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
    <div class="container top_wisata ">
        <div class="d-none d-md-block">
            <div class="row mb-5">
                <div class="text-center">
                    <p class="" style="font-size: 28px; font-weight: 400;">
                        <b>Paket Open Trip, Private Trip & Land Trip di Labuan Bajo
                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none">
            <div class="container text-center"">
                <p class="" style="font-size: 16px; font-weight: 400;">
                    <b>Paket Open Trip di Labuan Bajo
                    </b>
                </p>
            </div>
        </div>
        <!-- Swiper -->
        <div class="d-md-flex justify-content-center flex-wrap">
            <!-- component -->
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
            <a href="">
                <div class="group relative m-0 h-72 w-96 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                    <div
                        class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                        <img src="{{ url('assets/bg/padar.png') }}"
                            class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                            alt="" />
                    </div>
                    <div
                        class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                        <h1 class="font-serif text-2xl font-bold text-white shadow-xl">Pulau Padar</h1>
                        <h1 class="text-sm font-light text-gray-200 shadow-xl">Rasakan sensasi pulau yang memanjakan mata
                        </h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="mt-5">
            <a href="{{ url('wisata') }}" class="btn btn-primary text-white bg-btn-visit" id="but_wisata">
                Semua Paket
            </a>
        </div>


        {{-- tentang --}}
        <div class="container top_wisata ">
            <div class="d-none d-md-block">
                <div class="row " style="margin-bottom: -50px;">
                    <div class="text-center">
                        <p class="" style="font-size: 28px; font-weight: 400;">
                            <b>Tentang Kami
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class=" flex w-200 flex-row rounded-xl bg-white bg-clip-border text-gray-700 ">
                <div class=" mx-4 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="https://indonesiajuara.asia/wp-content/uploads/2022/05/IndonesiaJuara-Trip-355x280-1-300x237.jpeg"
                        style="width: 350rem !important; height: 20rem;" alt="img-blur-shadow" layout="fill" />
                </div>
                <div class="p-6">
                    <div>

                    </div>
                    <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                        Eastpearl merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep
                        berpetualang di wisata alam Indonesia. Berpengalaman lebih dari 7 tahun dengan review Tour Terbaik
                        di
                        TripAdvisor, kami menyediakan paket wisata Open Trip dan Private Trip—termasuk sewa kapal Phinisi.
                        Destinasi wisata pilihan kami adalah Labuan Bajo, Sumba, Nusa Penida, Raja Ampat, dan Derawan.
                        Dengan
                        tim Guide Lokal yang memiliki pengetahuan daerah yang lengkap dan pelayanan dari hati,
                        IndonesiaJuara
                        memastikan setiap wisatawan yang berlibur bersama IndonesiaJuara akan mendapatkan pengalaman
                        terbaiknya!
                        Kami juga menjamin harga terbaik, tanpa hidden fee. Informasi biaya setiap paket trip ditampilkan
                        sedetail mungkin dan akan diperjelas lagi saat berkomunikasi via WhatsApp agar kamu bisa
                        merencanakan
                        budget liburan dengan tepat.
                    </p>
                </div>
            </div>
        @endsection

        @section('script')
            <!-- Swiper JS -->
            <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

            <!-- Initialize Swiper -->
            <script></script>
        @endsection
