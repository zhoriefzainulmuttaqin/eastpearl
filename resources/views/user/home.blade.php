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
            background-color: #ba1918;
        }

        @media (max-width: 760px) {
            #home-event-container {
                background-size: cover;
                height: 38em;
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
                margin-bottom: 1rem;
                margin-top: -5% !important;
            }

            .subt_event {
                font-size: 12px;

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
        <div class=" container mt-md-0 text-white" style="margin-top: -4rem !important; margin-bottom: 5rem;">
            <p class=" text-center title_event">
                {{ __('home.slogan_atas') }}
            </p>
            <p class=" text-center subt_event" style="margin-top: 1rem;">
                {{ __('home.text_slogan_atas') }}
            </p>

            <div class="d-flex flex-row mt-4">
                <div class="col-6">

                    <iframe class="rounded-xl mt-4 shadow-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1794735.3830136342!2d117.33893461917772!3d-9.542222171245745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db4667f78c5c9c3%3A0x2543ed6a00d784da!2sBadjo%2C%20Labuan%20Bajo%2C%20Kec.%20Komodo%2C%20Kabupaten%20Manggarai%20Barat%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1715242527886!5m2!1sid!2sid"
                        width="200" height="100" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-6 ml-3 mt-5">

                    <div id="default-carousel" class="relative" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="overflow-hidden relative h-80 shadow-lg rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            @foreach ($trip as $index => $dest)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <span
                                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">{{ $index + 1 }}</span>
                                    <img src="{{ url("/assets/destination/{$dest->image}") }}"
                                        class="block absolute top-1/2 left-1/2 w-full h- -translate-x-1/2 -translate-y-1/2"
                                        alt="{{ $dest->name }}">
                                </div>
                            @endforeach
                        </div>
                        <!-- Slider indicators -->
                        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                            @foreach ($trip as $index => $dest)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                    aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                                <span class="hidden">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="hidden">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div id="home-event-container" class="d-block d-md-none">
        <div class=" container mt-md-0 text-white" style="margin-top: -4rem !important;">
            <p class=" text-center title_event">
                {{ __('home.slogan_atas') }}
            </p>
            <p class=" text-center subt_event">
                {{ __('home.text_slogan_atas') }}

            </p>
            <div class="d-flex flex-col mt-4">
                <div class="col-11 ml-auto mr-auto shadow-lg">
                    <iframe class="rounded-xl  shadow-lg"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1794735.3830136342!2d117.33893461917772!3d-9.542222171245745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db4667f78c5c9c3%3A0x2543ed6a00d784da!2sBadjo%2C%20Labuan%20Bajo%2C%20Kec.%20Komodo%2C%20Kabupaten%20Manggarai%20Barat%2C%20Nusa%20Tenggara%20Tim.!5e0!3m2!1sid!2sid!4v1715242527886!5m2!1sid!2sid"
                        width="200" height="100" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="col-11 mt-2 ml-auto mr-auto shadow-lg">

                    <div id="default-carousel" class="relative" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="overflow-hidden relative h-36 shadow-lg rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            @foreach ($trip as $index => $dest)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <span
                                        class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">{{ $index + 1 }}</span>
                                    <img src="{{ url("/assets/destination/{$dest->image}") }}"
                                        class="block absolute top-1/2 left-1/2 w-full h- -translate-x-1/2 -translate-y-1/2"
                                        alt="{{ $dest->name }}">
                                </div>
                            @endforeach


                        </div>
                        <!-- Slider indicators -->
                        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                            @foreach ($trip as $index => $dest)
                                <button type="button" class="w-2 h-2 rounded-full" aria-current="false"
                                    aria-label="Slide {{ $index + 1 }}"
                                    data-carousel-slide-to="{{ $index }}"></button>
                            @endforeach
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                                <span class="hidden">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="hidden">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
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
    <div class="d-none d-md-block" style="position: relative; margin-top: 40px;">
        <div class="wave wave1">

        </div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>
    <div class="d-block d-md-none" style="position: relative; margin-top: 0;">
        <div class="wave wave1">

        </div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>

    <style>
        .background-text {
            background-image: url('assets/destination/padar.webp');
            /* Ganti dengan path gambar Anda */
            background-size: cover;
            /* Untuk memastikan gambar menutupi seluruh area teks */
            -webkit-background-clip: text;
            /* Untuk menerapkan gambar sebagai latar belakang teks */
            color: transparent;
            background-position: center;
            line-height: 50px;
            /* text-shadow: 0px 20px, 20px 0px, 20px 20px; */

            /* Membuat teks menjadi transparan */
        }
    </style>

    <div class="container top_wisata mt-4 d-none d-md-block">
        <div class="">
            <div class="row ">
                <div class="text-center">
                    <p class="background-text  font-sans " style="font-size: 58px; font-weight: 1000;">
                        {!! nl2br(__('home.rekomendasi')) !!}

                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mt-3">
            <div class="rounded-xl col-5 ">
                <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="{{ url('assets/services/' . $topServices->image) }}"
                        style="width: 250rem !important; height: 20rem;" alt="img-blur-shadow" layout="fill" />
                </div>

            </div>
            <div class="p-7 col-7">

                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    @if (App::isLocale('id'))
                        <div class="d-flex flex-col">
                            <div class="d-flex flex-col">
                                <span style="font-size: 26px; font-weight: 900;">
                                    {{ $topServices->name }}:
                                </span>
                                <span>IDR {{ number_format($topServices->price, 0, ',', '.') }} Nett/pax
                                </span>
                            </div>
                            <div>
                                <span style="font-size: 26px; font-weight: 900;">
                                    Termasuk:
                                </span>
                                <span class="d-flex flex-row">
                                    @foreach ($facilities as $fas)
                                        <li>{{ $fas->name }}</li>
                                    @endforeach
                                </span>
                            </div>
                            <div class="d-flex flex-col">
                                <span style="font-size: 26px; font-weight: 900;">
                                    Tidak Termasuk:
                                </span>
                                <span class="d-flex flex-row">
                                    @foreach ($facilities as $fas)
                                        <li>{{ $fas->name }}</li>
                                    @endforeach
                                </span>
                            </div>
                            <div class="d-flex flex-col">
                                <span style="font-size: 26px; font-weight: 900;">
                                    Rute:
                                </span>
                                <span class="d-flex flex-row">
                                    @foreach ($destination as $dest)
                                        <li>{{ $dest->name }}</li>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    @elseif(App::isLocale('en'))
                        {{ $about->long_description_en }}
                    @else
                        {{ $about->long_description_mandarin }}
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 mt-4 d-block d-md-none">
        <div class="">
            <div class="row " style="margin-bottom: -50px;">
                <div class="text-center">
                    <p class="" style="font-size: 16px; font-weight: 400;">
                        <b> {{ __('home.rekomendasi') }}

                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-col mt-4 mb-4">
            <div class="rounded-xl  mt-5">
                <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="{{ url('assets/tentang/' . $about->image) }}" style="width: 80% !important; height: 15rem;"
                        alt="img-blur-shadow" layout="fill" />
                </div>

            </div>
            <div class="p-1 mt-2">

                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased"
                    style="font-size: 12px;">
                    @if (App::isLocale('id'))
                        {{ $about->long_description }}
                    @elseif(App::isLocale('en'))
                        {{ $about->long_description_en }}
                    @else
                        {{ $about->long_description_mandarin }}
                    @endif
                </p>
            </div>
        </div>
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
            background-color: #ba1918;
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
    <div class="container top_wisata mt-6">
        <div class="d-none d-md-block">
            <div class="row mb-5">
                <div class="text-center">
                    <p class="" style="font-size: 28px; font-weight: 400;">
                        <b>
                            {{ __('home.paket') }}

                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-block d-md-none">
            <div class="container text-center">
                <p class="" style="font-size: 16px; font-weight: 400;">
                    <b> {{ __('home.paket') }}

                    </b>
                </p>
            </div>
        </div>
        <!-- Swiper -->
        <div class="d-md-flex justify-content-center flex-wrap d-none d-md-block">
            <!-- component -->
            @foreach ($categories as $kategori)
                <a href="{{ url('layanan/' . $kategori->slug) }}">
                    <div
                        class="group relative m-0 h-72 w-72 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
                        <div
                            class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                            <img src="{{ url("/assets/kategori/$kategori->image") }}"
                                class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                                alt="" />
                        </div>
                        <div
                            class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                            <h1 class="font-serif text-2xl font-bold text-white shadow-xl">
                                @if (App::isLocale('id'))
                                    {{ $kategori->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $kategori->name_en }}
                                @else
                                    {{ $kategori->name_mandarin }}
                                @endif
                            </h1>
                            </h1>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="d-md-flex justify-content-center flex-wrap d-block d-md-none">
            <!-- component -->
            @foreach ($categories as $kategori)
                <a href="{{ url('layanan/' . $kategori->slug) }}">
                    <div
                        class="group relative m-0 h-72 w-72 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-auto mt-2">
                        <div
                            class="z-10 h-full w-full overflow-hidden rounded-xl border border-gray-200 opacity-80 transition duration-300 ease-in-out group-hover:opacity-100 dark:border-gray-700 dark:opacity-70">
                            <img src="{{ url("/assets/kategori/$kategori->image") }}"
                                class="animate-fade-in block h-full w-full scale-100 transform object-cover object-center opacity-100 transition duration-300 group-hover:scale-110"
                                alt="" />
                        </div>
                        <div
                            class="absolute bottom-0 z-20 m-0 pb-4 ps-4 transition duration-300 ease-in-out group-hover:-translate-y-1 group-hover:translate-x-3 group-hover:scale-110">
                            <h1 class="font-serif text-2xl font-bold text-white shadow-xl">
                                @if (App::isLocale('id'))
                                    {{ $kategori->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $kategori->name_en }}
                                @else
                                    {{ $kategori->name_mandarin }}
                                @endif
                            </h1>
                            </h1>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>


    {{-- tentang --}}
    <div class="container top_wisata mt-4 d-none d-md-block">
        <div class="">
            <div class="row " style="margin-bottom: -50px;">
                <div class="text-center">
                    <p class="" style="font-size: 28px; font-weight: 400;">
                        <b> {{ __('home.tentang_kami') }}

                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mt-4">
            <div class="rounded-xl  ">
                <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="{{ url('assets/tentang/' . $about->image) }}"
                        style="width: 250rem !important; height: 20rem;" alt="img-blur-shadow" layout="fill" />
                </div>

            </div>
            <div class="p-6">

                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    @if (App::isLocale('id'))
                        {{ $about->long_description }}
                    @elseif(App::isLocale('en'))
                        {{ $about->long_description_en }}
                    @else
                        {{ $about->long_description_mandarin }}
                    @endif
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid p-5 mt-4 d-block d-md-none">
        <div class="">
            <div class="row " style="margin-bottom: -50px;">
                <div class="text-center">
                    <p class="" style="font-size: 16px; font-weight: 400;">
                        <b> {{ __('home.tentang_kami') }}

                        </b>
                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-col mt-4 mb-4">
            <div class="rounded-xl  mt-5">
                <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="{{ url('assets/tentang/' . $about->image) }}" style="width: 80% !important; height: 15rem;"
                        alt="img-blur-shadow" layout="fill" />
                </div>

            </div>
            <div class="p-1 mt-2">

                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased"
                    style="font-size: 12px;">
                    @if (App::isLocale('id'))
                        {{ $about->long_description }}
                    @elseif(App::isLocale('en'))
                        {{ $about->long_description_en }}
                    @else
                        {{ $about->long_description_mandarin }}
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

    <!-- Initialize Swiper -->
    <script></script>
@endsection
