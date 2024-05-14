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
            height: 52em;

        }

        @media (max-width: 760px) {
            #home-event-container {
                background-size: cover;
                height: 46.5em;
                /* padding-top: 100px !important; */
                /* padding-bottom: 10px; */
                /* margin-top: 0rem; */
                display: inline;
            }
        }
    </style>

    <!-- Demo styles -->
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
            font-size: 16px;

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
                font-size: 8px;
                margin-top: -8px;

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
                {!! nl2br(__('home.text_slogan_atas')) !!}
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
                        <div class="overflow-hidden relative h-80 shadow-lg rounded-lg sm:h-80 xl:h-80 2xl:h-80">
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
            <p class="container text-center subt_event ">
                {!! nl2br(__('home.text_slogan_atas')) !!}
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
                        <div class="gambar_destinasi overflow-hidden relative  shadow-lg rounded-lg" style="height: 11em;">
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
    <div class="d-none d-md-block" style="position: relative; margin-top: 30px;">
        <div class="wave wave1">

        </div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>
    <div class="d-block d-md-non" style="position: relative; margin-top: 30px;">
        <div class="wave wave1">

        </div>
        <div class="wave wave2"></div>
        <div class="wave wave3"></div>
        <div class="wave wave4"></div>
    </div>

    <style>
        .background-text {
            background-color: #ba1918;
            /* Ganti dengan path gambar Anda */
            background-size: cover;
            /* Untuk memastikan gambar menutupi seluruh area teks */
            -webkit-background-clip: text;
            /* Untuk menerapkan gambar sebagai latar belakang teks */
            color: transparent;
            background-position: center;
            line-height: 60px;
            /* text-shadow: 0px 20px, 20px 0px, 20px 20px; */

            /* Membuat teks menjadi transparan */
        }

        @media only screen and (max-width: 760px) {
            .background-text {
                background-color: #ba1918;
                /* Ganti dengan path gambar Anda */

                background-position: center;
                line-height: 20px;
                /* text-shadow: 0px 20px, 20px 0px, 20px 20px; */

                /* Membuat teks menjadi transparan */
            }

            .include {
                /* display: flex; */
                flex-wrap: wrap;
            }

            .exclude {
                /* display: flex; */
                flex-wrap: wrap;
            }



        }
    </style>

    <div class="container top_wisata mt-4 d-none d-md-block">
        <div class="">
            <div class="row ">
                <div class="text-center">
                    <p class="background-text  font-sans " style="font-size: 40px; font-weight: 1000;">
                        {!! nl2br(__('home.rekomendasi')) !!}

                    </p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row mt-3">
            <div class="rounded-xl col-5 ">
                <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                    <img src="{{ url('assets/bus.png') }}" style="width: 250rem !important; height: 20rem;"
                        alt="img-blur-shadow" layout="fill" />
                </div>

            </div>
            <div class="p-7 col-7">

                @if (App::isLocale('id'))
                    <div class="d-flex flex-col font-sans">
                        @foreach ($topServices as $serv)
                            <div class="d-flex flex-col" style="font-size: 26px;">
                                <span style=" font-weight: 900;">
                                    @if ($serv->name == 'One Day Trip')
                                        {{ $serv->name }} (SpeedBoat)
                                    @elseif ($serv->name == 'one day trip')
                                        {{ $serv->name }} (SpeedBoat)
                                    @else
                                        <div class="mt-2">
                                            {{ $serv->name }} (Bus)
                                        </div>
                                    @endif
                                </span>
                                <span style="color: #F35E46;">IDR
                                    {{ number_format($serv->price, 0, ',', '.') }}
                                    Nett/pax
                                </span>
                            </div>
                        @endforeach

                        <div class="mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                Termasuk
                            </span>
                            <span class="d-flex ">
                                <div class="d-flex align-items-center ">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                    <span>Trekking</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/2120/2120781.png"
                                        alt="">
                                    <span>Snorkeling</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/4746/4746811.png"
                                        alt="">
                                    <span>Relaxing</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/7802/7802662.png"
                                        alt="">
                                    <span>Hiking</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                        alt="">
                                    <span>Swimming</span>
                                </div>
                            </span>
                        </div>
                        <div class="d-flex flex-col mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                Tidak Termasuk
                            </span>
                            <span class="d-flex">
                                <div class="d-flex align-items-center">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>Tiket Masuk</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>Biaya Penjaga Hutan</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                        alt="">
                                    <span>Sarapan</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                        alt="">
                                    <span>Pembelian pribadi</span>
                                </div>
                            </span>
                        </div>
                    </div>
                @elseif(App::isLocale('en'))
                    <div class="d-flex flex-col font-sans">
                        @foreach ($topServices as $serv)
                            <div class="d-flex flex-col" style="font-size: 26px;">
                                <span style=" font-weight: 900;">
                                    @if ($serv->name == 'One Day Trip')
                                        {{ $serv->name_en }} (SpeedBoat)
                                    @elseif ($serv->name == 'one day trip')
                                        {{ $serv->name }} (SpeedBoat)
                                    @else
                                        <div class="mt-2">
                                            {{ $serv->name_en }} (Bus)
                                        </div>
                                    @endif
                                </span>
                                <span style="color: #F35E46;">IDR
                                    {{ number_format($serv->price, 0, ',', '.') }}
                                    Nett/pax
                                </span>
                            </div>
                        @endforeach

                        <div class="mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                Include
                            </span>
                            <span class="d-flex">
                                <div class="d-flex align-items-center">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                    <span>Trekking</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/2120/2120781.png"
                                        alt="">
                                    <span>Snorkeling</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/4746/4746811.png"
                                        alt="">
                                    <span>Relaxing</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/7802/7802662.png"
                                        alt="">
                                    <span>Hiking</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                        alt="">
                                    <span>Swimming</span>
                                </div>
                            </span>
                        </div>
                        <div class="d-flex flex-col mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                Exclude
                            </span>
                            <span class="d-flex">
                                <div class="d-flex align-items-center ">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>Entrance Fee</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>Ranger Fee</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                        alt="">
                                    <span>Breakfast</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                        alt="">
                                    <span>Personal purchase</span>
                                </div>
                            </span>
                        </div>
                    </div>
                @else
                    <div class="d-flex flex-col font-sans">
                        @foreach ($topServices as $serv)
                            <div class="d-flex flex-col" style="font-size: 26px;">
                                <span style=" font-weight: 900;">
                                    @if ($serv->name == 'One Day Trip')
                                        {{ $serv->name_mandarin }} (快艇):
                                    @elseif ($serv->name == 'one day trip')
                                        {{ $serv->name_mandarin }} (快艇):
                                    @else
                                        <div class="mt-2">
                                            {{ $serv->name_mandarin }} (公共汽车):
                                        </div>
                                    @endif

                                </span>
                                <span style="color: #F35E46;">IDR
                                    {{ number_format($serv->price, 0, ',', '.') }}
                                    Nett/pax
                                </span>
                            </div>
                        @endforeach

                        <div class="mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                包括:
                            </span>
                            <span class="d-flex">
                                <div class="d-flex align-items-center">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                    <span>徒步旅行</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/2120/2120781.png"
                                        alt="">
                                    <span>浮潜</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/4746/4746811.png"
                                        alt="">
                                    <span>放松</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2" src="https://cdn-icons-png.freepik.com/256/7802/7802662.png"
                                        alt="">
                                    <span>远足</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                        alt="">
                                    <span>游泳</span>
                                </div>
                            </span>
                        </div>
                        <div class="d-flex flex-col mt-2">
                            <span style="font-size: 26px; font-weight: 900;">
                                排除:
                            </span>
                            <span class="d-flex ">
                                <div class="d-flex align-items-center">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>入场费</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                        alt="">
                                    <span>护林员费</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                        alt="">
                                    <span>早餐</span>
                                </div>
                                <div class="d-flex align-items-center ml-4">
                                    <img class="h-4 w-4 mr-2"
                                        src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                        alt="">
                                    <span>个人购买</span>
                                </div>
                            </span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if (App::isLocale('id'))
            <div class="d-flex" style="justify-content: center;">
                @foreach ($topServices as $serv)
                    <a href="/layanan/detail/{{ $serv->slug }}">
                        <button type="button"
                            class="d-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <i class="uil-arrow-right"></i>
                            <span>{{ $serv->name }}</span>
                            <i class="uil-arrow-left"></i>

                        </button>
                    </a>
                @endforeach
            </div>
        @elseif(App::isLocale('en'))
            <div class="d-flex" style="justify-content: center;">
                @foreach ($topServices as $serv)
                    <a href="/layanan/detail/{{ $serv->slug }}">
                        <button type="button"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <i class="uil-arrow-right"></i>
                            <span>{{ $serv->name_en }}</span>
                            <i class="uil-arrow-left"></i>
                        </button>
                    </a>
                @endforeach
            </div>
        @else
            <div class="d-flex" style="justify-content: center;">
                @foreach ($topServices as $serv)
                    <a href="/layanan/detail/{{ $serv->slug }}">
                        <button type="button"
                            class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <i class="uil-arrow-right"></i>
                            <span>{{ $serv->name_mandarin }}</span>
                            <i class="uil-arrow-left"></i>
                        </button>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    <div class="container mt-6 d-block d-md-none">
        <div class="col-11 ml-auto mr-auto">

            <div class="">
                <div class="row " style="margin-bottom: -30px; margin-top: -30px;">
                    <div class="text-center">
                        <p class="background-text " style="font-size: 16px; font-weight: 900;">
                            <b>
                                {!! nl2br(__('home.rekomendasi')) !!}
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-col mt-5">
                <div class="rounded-xl col-12 ">
                    <div class="  overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                        <img src="{{ url('assets/bus.png') }}" style="width: auto !important; height: auto;"
                            alt="img-blur-shadow" layout="fill" />
                    </div>

                </div>
                <div class="col-12">

                    @if (App::isLocale('id'))
                        <div class="d-flex flex-col justify-content-lg-center mt-4">
                            @foreach ($topServices as $serv)
                                <div class="d-flex flex-col" style="font-size: 18px;">
                                    <span style=" font-weight: 900;">
                                        @if ($serv->name == 'One Day Trip')
                                            {{ $serv->name }} (SpeedBoat)
                                        @elseif ($serv->name == 'one day trip')
                                            {{ $serv->name }} (SpeedBoat)
                                        @else
                                            <div class="mt-2">
                                                {{ $serv->name }} (Bus)
                                            </div>
                                        @endif
                                    </span>
                                    <span style="color: #F35E46; font-size: 20px">IDR
                                        {{ number_format($serv->price, 0, ',', '.') }}
                                        Nett/pax
                                    </span>
                                </div>
                            @endforeach

                            <div class="mt-2">
                                <span style="font-size: 22px; font-weight: 900;">Termasuk</span>
                                <div class="d-flex include mt-2">
                                    <div class="d-flex align-items-center item-include mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                        <span>Trekking</span>
                                    </div>
                                    <div class="d-flex align-items-center item-include mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/2120/2120781.png" alt="">
                                        <span>Snorkeling</span>
                                    </div>
                                    <div class="d-flex align-items-center item-include mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/4746/4746811.png" alt="">
                                        <span>Relaxing</span>
                                    </div>
                                    <div class="d-flex align-items-center item-include mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/7802/7802662.png" alt="">
                                        <span>Hiking</span>
                                    </div>
                                    <div class="d-flex align-items-center item-include">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                            alt="">
                                        <span>Swimming</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-col mt-2">
                                <span style="font-size: 22px; font-weight: 900;">
                                    Tidak Termasuk
                                </span>
                                <span class="d-flex exclude">
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>Tiket Masuk</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>Biaya Penjaga Hutan</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                            alt="">
                                        <span>Sarapan</span>
                                    </div>
                                    <div class="d-flex align-items-center  ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                            alt="">
                                        <span>Pembelian pribadi</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @elseif(App::isLocale('en'))
                        <div class="d-flex flex-col justify-content-lg-center mt-4">
                            @foreach ($topServices as $serv)
                                <div class="d-flex flex-col" style="font-size: 18px;">
                                    <span style=" font-weight: 900;">
                                        @if ($serv->name == 'One Day Trip')
                                            {{ $serv->name_en }} (SpeedBoat)
                                        @elseif ($serv->name == 'one day trip')
                                            {{ $serv->name_en }} (SpeedBoat)
                                        @else
                                            <div class="mt-2">
                                                {{ $serv->name_en }} (Bus)
                                            </div>
                                        @endif
                                    </span>
                                    <span style="color: #F35E46; font-size: 20px">IDR
                                        {{ number_format($serv->price, 0, ',', '.') }}
                                        Nett/pax
                                    </span>
                                </div>
                            @endforeach

                            <div class="mt-2">
                                <span style="font-size: 22px; font-weight: 900;">
                                    Include
                                </span>
                                <span class="d-flex include ">
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                        <span>Trekking</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/2120/2120781.png" alt="">
                                        <span>Snorkeling</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/4746/4746811.png" alt="">
                                        <span>Relaxing</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/7802/7802662.png" alt="">
                                        <span>Hiking</span>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                            alt="">
                                        <span>Swimming</span>
                                    </div>
                                </span>
                            </div>
                            <div class="d-flex flex-col  mt-2">
                                <span style="font-size: 22px; font-weight: 900;">
                                    Exclude
                                </span>
                                <span class="d-flex exclude">
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>Entrance Fee</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>Ranger Fee</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                            alt="">
                                        <span>Breakfast</span>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                            alt="">
                                        <span>Personal purchase</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="d-flex flex-col justify-content-lg-center mt-4">
                            @foreach ($topServices as $serv)
                                <div class="d-flex flex-col" style="font-size: 18px;">
                                    <span style=" font-weight: 900;">
                                        @if ($serv->name == 'One Day Trip')
                                            {{ $serv->name_mandarin }} (快艇)
                                        @elseif ($serv->name == 'one day trip')
                                            {{ $serv->name_mandarin }} (快艇)
                                        @else
                                            <div class="mt-2">
                                                {{ $serv->name_mandarin }} (公共汽车)
                                            </div>
                                        @endif
                                    </span>
                                    <span style="color: #F35E46; font-size: 20px">IDR
                                        {{ number_format($serv->price, 0, ',', '.') }}
                                        Nett/pax
                                    </span>
                                </div>
                            @endforeach

                            <div class="mt-2">
                                <span style="font-size: 22px; font-weight: 900;">
                                    包括
                                </span>
                                <span class="d-flex  include ">
                                    <div class="d-flex align-items-center mr-4 item-include">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/15052/15052974.png" alt="">
                                        <span>徒步旅行</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/2120/2120781.png" alt="">
                                        <span>浮潜</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4  ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/4746/4746811.png" alt="">
                                        <span>放松</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/7802/7802662.png" alt="">
                                        <span>远足</span>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1859/1859174.png?uid=R21317414"
                                            alt="">
                                        <span>游泳</span>
                                    </div>
                                </span>
                            </div>
                            <div class="d-flex flex-col mt-2">
                                <span style="font-size: 22px; font-weight: 900;">
                                    排除
                                </span>
                                <span class="d-flex  exclude">
                                    <div class="d-flex align-items-center mr-4">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>入场费</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1665/1665372.png?uid=R21317414"
                                            alt="">
                                        <span>护林员费</span>
                                    </div>
                                    <div class="d-flex align-items-center mr-4 ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/8174/8174280.png?uid=R21317414"
                                            alt="">
                                        <span>早餐</span>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img class="h-4 w-4 mr-2"
                                            src="https://cdn-icons-png.freepik.com/256/1345/1345645.png?uid=R21317414"
                                            alt="">
                                        <span>个人购买</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @if (App::isLocale('id'))
                <div class="d-flex flex-col mt-3" style="justify-content: center;">
                    @foreach ($topServices as $serv)
                        <a href="/layanan/detail/{{ $serv->slug }}">
                            <button type="button"
                                class="d-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-2 py-2.5 w-100 text-center  mb-2">
                                <span class="ml-auto mr-auto">{{ $serv->name }}</span>

                            </button>
                        </a>
                    @endforeach
                </div>
            @elseif(App::isLocale('en'))
                <div class="d-flex flex-col mt-3" style="justify-content: center;">
                    @foreach ($topServices as $serv)
                        <a href="/layanan/detail/{{ $serv->slug }}">
                            <button type="button"
                                class="d-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-2 py-2.5 w-100 text-center  mb-2">
                                <span class="ml-auto mr-auto">{{ $serv->name_en }}</span>

                            </button>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="d-flex flex-col mt-3 mb-5" style="justify-content: center;">
                    @foreach ($topServices as $serv)
                        <a href="/layanan/detail/{{ $serv->slug }}">
                            <button type="button"
                                class="d-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-2 py-2.5 w-100 text-center  mb-2">
                                <span class="ml-auto mr-auto">{{ $serv->name_mandarin }}</span>
                            </button>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>


    <div class="container top_wisata ">
        <div class="d-none d-md-block mt-5">
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
        <div class="d-block d-md-none mt-5">
            <div class="row mb-3">
                <div class="text-center">
                    <p class="" style="font-size: 16px; font-weight: 400;">
                        <b>
                            {{ __('home.paket') }}

                        </b>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <!-- Swiper -->
    <div class="d-md-flex justify-content-center flex-wrap d-none d-md-block " style="margin-top: -10px;">
        <!-- component -->
        @foreach ($categories as $kategori)
            <a href="{{ url('layanan/' . $kategori->slug) }}">
                <div class="group relative m-0 h-72 w-72 rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-2">
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
    <div class="container d-md-flex justify-content-center flex-wrap d-block d-md-none mt-3">
        <div class="col-11 ml-auto mr-auto">
            <!-- component -->
            @foreach ($categories as $kategori)
                <a href="{{ url('layanan/' . $kategori->slug) }}">
                    <div
                        class="group relative m-0 h-72 w-auto rounded-xl shadow-xl ring-gray-900/5 sm:mx-auto sm:max-w-lg m-auto mt-2">
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

    {{-- css kuliner --}}
    <style>
        .top_kuliner {
            /* margin-top: 6rem; */
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

        .kuliner .owl-carousel .owl-dots .owl-dot {
            margin-top: -1em;
            height: 0.3em;
            width: 0.3em;
        }


        @media (max-width: 768px) {
            .kuliner_caption .image-caption {

                font-size: 16px;
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
                margin-top: 3em;
            }

            .event {
                width: 16.5rem;
                /* height: 100%; */
                margin: auto;
            }

            .kuliner .owl-carousel .owl-dots .owl-dot {
                margin-top: -10em !important;
                height: 0.3em;
                width: 0.3em;
            }

            .image-caption p {
                color: white;
                margin: 0;

            }
        }
    </style>
    {{-- end css kuliner --}}



    {{-- web --}}
    <div class="container d-none d-md-block">
        <div class="col-11 ml-auto mr-auto">

            <div class="row mb-5 top_kuliner">

            </div>
            <div class="row mb-2">
                <div class="text-center">
                    <p class="" style="font-size: 26px; font-weight: 400;">
                        <b class="mb-1 ">
                            <b>{{ __('home.layanan_lainnya') }}</b>
                        </b>
                    <div class="text-lg " style="font-size: 18px;">
                        {{ __('home.text_layanan_lainnya') }}
                    </div>
                    </p>
                </div>
            </div>

            <div class="">
                <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="0"
                    data-pagi="true" data-items="2" data-items-md="2" data-items-lg="3" data-items-xl="3"
                    data-autoplay="3000" data-loop="true">
                    <div class="oc-item mt-2">
                        <article class="entry event " style="padding-left: 0.5em; padding-right: 0.5em;">
                            <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                style="height: 15rem;">
                                <div class=" mb-md-0">
                                    <a href="{{ url('kuliner') }}" class="entry-image">
                                        <img src='{{ url('assets/bg/padar.jpg') }}' alt="Padar" class="rounded-2"
                                            style="max-height: 20rem;">
                                    </a>
                                </div>
                                <div class="image-caption text-center"
                                    style="background: #000000 transparent; color: #ddd; ">
                                    @if (App::isLocale('id'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @elseif (App::isLocale('en'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @else
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="oc-item mt-2">
                        <article class="entry event " style="padding-left: 0.5em; padding-right: 0.5em;">
                            <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                style="height: 15rem;">
                                <div class=" mb-md-0">
                                    <a href="{{ url('kuliner') }}" class="entry-image">
                                        <img src='{{ url('assets/bg/padar.jpg') }}' alt="Padar" class="rounded-2"
                                            style="max-height: 20rem;">
                                    </a>
                                </div>
                                <div class="image-caption text-center"
                                    style="background: #000000 transparent; color: #ddd; ">
                                    @if (App::isLocale('id'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @elseif (App::isLocale('en'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @else
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="oc-item mt-2">
                        <article class="entry event " style="padding-left: 0.5em; padding-right: 0.5em;">
                            <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                style="height: 15rem;">
                                <div class=" mb-md-0">
                                    <a href="{{ url('kuliner') }}" class="entry-image">
                                        <img src='{{ url('assets/bg/padar.jpg') }}' alt="Padar" class="rounded-2"
                                            style="max-height: 20rem;">
                                    </a>
                                </div>
                                <div class="image-caption text-center"
                                    style="background: #000000 transparent; color: #ddd; ">
                                    @if (App::isLocale('id'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @elseif (App::isLocale('en'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @else
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="oc-item mt-2">
                        <article class="entry event " style="padding-left: 0.5em; padding-right: 0.5em;">
                            <div class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption"
                                style="height: 15rem;">
                                <div class=" mb-md-0">
                                    <a href="{{ url('kuliner') }}" class="entry-image">
                                        <img src='{{ url('assets/bg/padar.jpg') }}' alt="Padar" class="rounded-2"
                                            style="max-height: 20rem;">
                                    </a>
                                </div>
                                <div class="image-caption text-center"
                                    style="background: #000000 transparent; color: #ddd; ">
                                    @if (App::isLocale('id'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @elseif (App::isLocale('en'))
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @else
                                        <b style="font-weight: 800;">Reflexiology</b>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- end web --}}

    {{-- mobile --}}
    <div class="container d-block d-md-none kuliner">
        <div class="col-11 ml-auto mr-auto">

            <div class="text-center" id="top_kuliner">
                <b class="h1 title_kuliner">{{ __('home.layanan_lainnya') }}</b>
                <br>
                <div style="font-size:10px">
                    {{ __('home.text_layanan_lainnya') }}
                </div>
            </div>
            <div id="oc-events" class="owl-carousel events-carousel carousel-widget" data-margin="1" data-pagi="true"
                data-items="1" data-items-md="2" data-items-lg="3" data-items-xl="3" data-autoplay='3000'
                data-loop='true'>
                <div class="oc-item">
                    <article class="entry event mt-3">
                        <div
                            class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption">
                            <div class="">
                                <a href="{{ url('kuliner') }}" class="">
                                    <img src="{{ url('assets/bg/tentang.jpg') }}" class="rounded-2">
                                    <div class="image-caption text-center"
                                        style="background: #000000 transparent; color: #ddd; ">
                                        @if (App::isLocale('id'))
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @elseif (App::isLocale('en'))
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @else
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="oc-item">
                    <article class="entry event mt-3">
                        <div
                            class="grid-inner bg-contrast-0 row g-0 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm kuliner_caption">
                            <div class="">
                                <a href="{{ url('kuliner') }}" class="">
                                    <img src="{{ url('assets/bg/tentang.jpg') }}" class="rounded-2">
                                    <div class="image-caption text-center"
                                        style="background: #000000 transparent; color: #ddd; ">
                                        @if (App::isLocale('id'))
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @elseif (App::isLocale('en'))
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @else
                                            <b style="font-weight: 800;">Coffee & Beer</b>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </div>
    {{-- end mobile --}}

    {{-- tentang --}}
    <div class="container top_wisata mt-5 d-none d-md-block">
        <div class="">
            <div class="row " style="margin-bottom: -40px;">
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
    <div class="container  mt-5 d-block d-md-none">
        <div class="col-11 ml-auto mr-auto">
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
                        <img src="{{ url('assets/tentang/' . $about->image) }}"
                            style="width: 250em !important; height: auto;" alt="img-blur-shadow" layout="fill" />
                    </div>

                </div>
                <div class="mt-2 p-2">

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
