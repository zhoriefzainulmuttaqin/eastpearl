@extends('user.template')

@section('title')
    @if (App::isLocale('id'))
        {{ $services->name }}
    @elseif (App::isLocale('en'))
        {{ $services->name_en }}
    @else
        {{ $services->name_mandarin }}
    @endif
@endsection
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@section('cover')
    <?= url("/assets/services/$services->image") ?>
@endsection

@section('content')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BV3NGNRL2G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BV3NGNRL2G');
    </script>
@section('style')
    <style>
        br {
            line-height: 0.5px !important;
        }

        .atas {
            top: -50px !important;
        }

        .title {
            font-size: 34px !important;
        }

        .title2 {
            font-size: 20px !important;
        }

        .price {
            font-size: 26px !important;
        }

        .trip_lainnya {
            font-size: 26px !important;
        }

        @media only screen and (max-width: 768px) {
            .title {
                line-height: 1.3em;
            }

            .titLin1 {
                font-size: 10px;
            }
        }
    </style>
@endsection
<div class="container-lg d-none d-lg-block">

    <div class="grid grid-cols-1 md:grid-cols-1 gap-1 flex-wrap">
        <div class="w-full">
            <div class="atas relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="titLin m-4 d-flex">
                    <nav aria-label="breadcrumb">
                        <ol class="flex space-x-2">
                            <li><a href="{{ url('/') }}"
                                    class="after:content-['/'] after:ml-2 text-gray-600 hover:text-red-700">{{ __('detail_layanan.home') }}</a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="goBack()"
                                    class="after:content-['/'] after:ml-2 text-gray-600 hover:text-red-700">{{ __('detail_layanan.layanan') }}</a>
                            </li>
                            <li class="text-red-700" aria-current="page">
                                @if (App::isLocale('id'))
                                    {{ $services->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $services->name_en }}
                                @else
                                    {{ $services->name_mandarin }}
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-3">
                    <span class="title font-semibold text-gray-900">
                        @if (App::isLocale('id'))
                            {{ $services->name }}
                        @elseif(App::isLocale('en'))
                            {{ $services->name_en }}
                        @else
                            {{ $services->name_mandarin }}
                        @endif
                    </span>
                </div>
                <div class="ms-4 mt-2 mb-4">
                    @if ($services->name == 'One Day Trip (6 Destinasi)')
                        <div class="d-flex">
                            <span class="price text-gray-600">{{ __('detail_layanan.start_from') }} Rp.
                                {{ number_format($services->price, 0, ',', '.') }}
                            </span>
                            @if (App::isLocale('id'))
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-100  text-center ms-2">
                                        <span class="text-xs">DAPATKAN HARGA KHUSUS LANGSUNG DI KANTOR KAMI
                                        </span>
                                    </button>
                                </a>
                            @elseif(App::isLocale('en'))
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-100  text-center ms-2">
                                        <span class="">GET SPECIAL PRICES DIRECTLY AT OUR OFFICE
                                        </span>
                                    </button>
                                </a>
                            @else
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-100  text-center ms-2">
                                        <span class="">D直接在我们的办公室获取特价
                                        </span>
                                    </button>
                                </a>
                            @endif
                        </div>
                    @else
                        <span class="price text-gray-600">{{ __('detail_layanan.start_from') }} Rp.
                            {{ number_format($services->price, 0, ',', '.') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-content-between">
        <div class="kiri flex-col col-9 " style="padding-right: 20px;">
            {{-- <div class="relative flex flex-col  rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <img class="rounded-xl" src="{{ url("/assets/services/$services->image") }}"
                    alt="{{ $services->slug }}" style="width: cover; height: 100%;" />
            </div> --}}
            <div id="default-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative shadow-lg h-70 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    @foreach ($ServicesGallery->take(5) as $index => $galeri)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <span
                                class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">{{ $index + 1 }}</span>
                            <img src="{{ url("/assets/galeri_layanan/$galeri->image") }}"
                                class="block absolute top-1/2 left-1/2 w-full h- -translate-x-1/2 -translate-y-1/2"
                                alt="{{ $galeri->image_name }}">
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    @foreach ($ServicesGallery->take(5) as $index => $galeri)
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
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

            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="titLin m-4 " style="text-align: justify;">

                    @if (App::isLocale('id'))
                        {!! nl2br($services->long_desc) !!}
                    @elseif(App::isLocale('en'))
                        {!! nl2br($services->long_desc_en) !!}
                    @else
                        {!! nl2br($services->long_desc_mandarin) !!}
                    @endif
                </div>
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.fasilitas') }}
                </div>
                <div class="m-4 ">
                    <ul class="list-disc ms-4">
                        @foreach ($facilities as $fas)
                            <li>
                                @if (App::isLocale('id'))
                                    {{ $fas->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $fas->name_en }}
                                @else
                                    {{ $fas->name_mandarin }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.seputar') }}
                </div>
                <div class="m-4 ">
                    <ul class="list-disc ms-4">
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.meeting') }}
                            </span>{{ $services->meeting_point }}
                        </li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.durasi') }}
                            </span>{{ $services->durasi }}</li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.peserta') }}
                            </span>{{ $services->minimal_peserta == 0 ? '-' : $services->minimal_peserta }}</li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.bulan') }}
                            </span>{{ $bulanTerbaik }}
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.aktivitas') }}
                            </span>{{ $services->aktivitas_fisik }}
                        </li>
                        <!-- ... -->
                    </ul>
                </div>
            </div>
            <div class="relative mt-2  flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.rute') }}
                </div>
                @foreach ($destination as $index => $dest)
                    <div class="m-4">
                        <div class="">
                            <details class="group" id="destination{{ $index }}">
                                <summary
                                    class="flex justify-between items-center font-medium cursor-pointer list-none">
                                    <span class="font-semibold text-gray-800">
                                        @if (App::isLocale('id'))
                                            {!! nl2br($dest->name) !!}
                                        @elseif(App::isLocale('en'))
                                            {!! nl2br($dest->name_en) !!}
                                        @else
                                            {!! nl2br($dest->name_mandarin) !!}
                                        @endif
                                    </span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <div class="flex mt-4">
                                    <img class="rounded-xl" src="{{ url("/assets/destination/{$dest->image}") }}"
                                        alt="{{ $dest->name }}" style="width: 50%; height: 100%;" />
                                    <p class="text-neutral-600 ml-3 mr-3 group-open:animate-fadeIn">
                                        @if (App::isLocale('id'))
                                            {!! nl2br($dest->description) !!}
                                        @elseif(App::isLocale('en'))
                                            {!! nl2br($dest->description_en) !!}
                                        @else
                                            {!! nl2br($dest->description_mandarin) !!}
                                        @endif
                                    </p>
                                </div>
                            </details>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="kanan col-3 ms-auto">
            <div class="flex">
                <div class="relative flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    @if (App::isLocale('id'))
                        <a href="{{ url('https://wa.link/6737vy') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i> <br> {{ __('detail_layanan.book_wa') }}
                        </a>
                    @elseif(App::isLocale('en'))
                        <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i> <br> {{ __('detail_layanan.book_wa') }}
                        </a>
                    @else
                        <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i> <br> {{ __('detail_layanan.book_wa') }}
                        </a>
                    @endif
                </div>
                <div
                    class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-envelope"></i><br> {{ __('detail_layanan.book_email') }}
                    </a>
                </div>
                <div
                    class="relative ms-2 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('weixin://dl/chat?eastpearl_id') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-chat"></i> <br>{{ __('detail_layanan.book_wechat') }}
                    </a>
                </div>
            </div>
            <div class="flex justify-content-left">
                <div
                    class="relative w-100 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('https://eastpearl-online.globaltix.com/') }}" class="btn text-white "
                        id="but_wisata">
                        <i class="uil uil-schedule"></i> <br> Booking Online
                    </a>
                </div>
            </div>

            <div>
                <div class="flex flex-col">

                    <span
                        class="trip_lainnya font-semibold text-gray-900">{{ __('detail_layanan.trip_lainnya') }}</span>
                    <span class="">{{ __('detail_layanan.rekomendasi') }}</span>
                </div>
                @foreach ($other_services->take(3) as $ots)
                    <a href="{{ url('/layanan/detail/' . $ots->slug) }}">

                        <div
                            class="relative flex flex-col mt-2 rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                            <img class="rounded-xl" src="{{ url("/assets/services/$ots->image") }}"
                                alt="{{ $ots->slug }}" style="width: 100%; height: 10rem;" />
                            <div class="m-3 flex flex-col">
                                <span class="title2 font-semibold text-gray-900 ">
                                    @if (App::isLocale('id'))
                                        {{ $ots->name }}
                                    @elseif(App::isLocale('en'))
                                        {{ $ots->name_en }}
                                    @else
                                        {{ $ots->name_mandarin }}
                                    @endif
                                </span>

                                @if (App::isLocale('id'))
                                    {!! nl2br(strlen($ots->short_desc) > 200 ? substr($ots->short_desc, 0, 200) . '...' : $ots->short_desc) !!}
                                @elseif(App::isLocale('en'))
                                    {!! nl2br(strlen($ots->short_desc_en) > 200 ? substr($ots->short_desc_en, 0, 200) . '...' : $ots->short_desc_en) !!}
                                @else
                                    {!! nl2br(
                                        strlen($ots->short_desc_mandarin) > 200
                                            ? substr($ots->short_desc_mandarin, 0, 200) . '...'
                                            : $ots->short_desc_mandarin,
                                    ) !!}
                                @endif

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex mt-4 justify-content-left">
        <div class="relative flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            @if (App::isLocale('id'))
                @if (App::isLocale('id'))
                    <a href="{{ url('https://wa.link/6737vy') }}" class="btn text-white " id="but_wisata"
                        target="_blank">
                        <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                    </a>
                @elseif(App::isLocale('en'))
                    <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                        target="_blank">
                        <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                    </a>
                @else
                    <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                        target="_blank">
                        <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                    </a>
                @endif
            @elseif(App::isLocale('en'))
                <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                    target="_blank">
                    <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                </a>
            @else
                <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                    target="_blank">
                    <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                </a>
            @endif
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-envelope"></i><br> {{ __('detail_layanan.book_email') }}
            </a>
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('weixin://dl/chat?eastpearl_id') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-chat"></i> <br> {{ __('detail_layanan.book_wechat') }}
            </a>
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('https://eastpearl-online.globaltix.com/') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-schedule"></i> <br> Booking Online
            </a>
        </div>
    </div>

</div>
<div class="container-lg d-block d-lg-none">

    <div class="grid grid-cols-1 md:grid-cols-1 gap-1 flex-wrap">
        <div class="w-full">
            <div class="atas relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="titLin1 ms-3 me-4 mt-4 d-flex">
                    <nav aria-label="breadcrumb">
                        <ol class="flex space-x-2">
                            <li><a href="{{ url('/') }}"
                                    class="after:content-['/'] after:ml-2 text-gray-600 hover:text-red-700">{{ __('detail_layanan.home') }}</a>
                            </li>
                            <li><a href="javascript:void(0)" onclick="goBack()"
                                    class="after:content-['/'] after:ml-2 text-gray-600 hover:text-red-700">{{ __('detail_layanan.layanan') }}</a>
                            </li>
                            <li class="text-red-700" aria-current="page">
                                @if (App::isLocale('id'))
                                    {{ $services->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $services->name_en }}
                                @else
                                    {{ $services->name_mandarin }}
                                @endif
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-3">
                    <span class="title font-semibold text-gray-900">
                        @if (App::isLocale('id'))
                            {{ $services->name }}
                        @elseif(App::isLocale('en'))
                            {{ $services->name_en }}
                        @else
                            {{ $services->name_mandarin }}
                        @endif
                    </span>
                </div>
                <div class="ms-3 mt-2 mb-4">
                    @if ($services->name == 'One Day Trip (6 Destinasi)')
                        <div class="d-flex flex-col">
                            <span class="price text-gray-600">{{ __('detail_layanan.start_from') }} Rp.
                                {{ number_format($services->price, 0, ',', '.') }}
                            </span>
                            @if (App::isLocale('id'))
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-90 me-4 text-center">
                                        <span class="text-xs">DAPATKAN HARGA KHUSUS LANGSUNG DI KANTOR KAMI
                                        </span>
                                    </button>
                                </a>
                            @elseif(App::isLocale('en'))
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-90 me-4 text-center">
                                        <span class="">GET SPECIAL PRICES DIRECTLY AT OUR OFFICE
                                        </span>
                                    </button>
                                </a>
                            @else
                                <a href="https://maps.app.goo.gl/RnVAH9jwNAD5uXjv5" target="_blank"
                                    rel="noopener noreferrer">
                                    <button type="button" aria-label="Click for details"
                                        class="blink text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 !bg-gradient-to-br font-medium rounded-lg text-sm px-2 py-2.5 w-90 me-4 text-center">
                                        <span class="">D直接在我们的办公室获取特价
                                        </span>
                                    </button>
                                </a>
                            @endif
                        </div>
                    @else
                        <span class="price text-gray-600">{{ __('detail_layanan.start_from') }} Rp.
                            {{ number_format($services->price, 0, ',', '.') }}
                        </span>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class=" justify-content-between">
        <div class="kiri flex-col col-12 " style="">
            {{-- <div class="relative flex flex-col  rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <img class="rounded-xl" src="{{ url("/assets/services/$services->image") }}"
                    alt="{{ $services->slug }}" style="width: cover; height: 100%;" />
            </div> --}}
            <div id="default-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-52 shadow-lg rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    @foreach ($ServicesGallery->take(5) as $index => $galeri)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <span
                                class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">{{ $index + 1 }}</span>
                            <img src="{{ url("/assets/galeri_layanan/$galeri->image") }}"
                                class="block absolute top-1/2 left-1/2 w-full h- -translate-x-1/2 -translate-y-1/2"
                                alt="{{ $galeri->image_name }}">
                        </div>
                    @endforeach
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    @foreach ($ServicesGallery->take(5) as $index => $galeri)
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
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="titLin m-4 " style="text-align: justify;">

                    @if (App::isLocale('id'))
                        {!! nl2br($services->long_desc) !!}
                    @elseif(App::isLocale('en'))
                        {!! nl2br($services->long_desc_en) !!}
                    @else
                        {!! nl2br($services->long_desc_mandarin) !!}
                    @endif
                </div>
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.fasilitas') }}
                </div>
                <div class="m-4 ">
                    <ul class="list-disc ms-4">
                        @foreach ($facilities as $fas)
                            <li>
                                @if (App::isLocale('id'))
                                    {{ $fas->name }}
                                @elseif(App::isLocale('en'))
                                    {{ $fas->name_en }}
                                @else
                                    {{ $fas->name_mandarin }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.seputar') }}
                </div>
                <div class="m-4 ">
                    <ul class="list-disc ms-4">
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.meeting') }}
                            </span>{{ $services->meeting_point }}
                        </li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.durasi') }}
                            </span>{{ $services->durasi }}</li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.peserta') }}
                            </span>{{ $services->minimal_peserta == 0 ? '-' : $services->minimal_peserta }}</li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.bulan') }}
                            </span>{{ $bulanTerbaik }}
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.aktivitas') }}
                            </span>{{ $services->aktivitas_fisik }}
                        </li>
                        <!-- ... -->
                    </ul>
                </div>
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="ms-4 mt-4 font-semibold text-gray-900">
                    {{ __('detail_layanan.rute') }}
                </div>
                @foreach ($destination as $index => $dest)
                    <div class="m-4">
                        <div class="">
                            <details class="group" id="destination{{ $index }}"
                                @if ($index === 0) open @endif>
                                <summary
                                    class="flex justify-between items-center font-medium cursor-pointer list-none">
                                    <span class="font-semibold text-gray-800">
                                        @if (App::isLocale('id'))
                                            {!! nl2br($dest->name) !!}
                                        @elseif(App::isLocale('en'))
                                            {!! nl2br($dest->name_en) !!}
                                        @else
                                            {!! nl2br($dest->name_mandarin) !!}
                                        @endif
                                    </span>
                                    <span class="transition group-open:rotate-180">
                                        <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </summary>
                                <div class="d-flex flex-col mt-2">
                                    <img class="rounded-xl" src="{{ url("/assets/destination/{$dest->image}") }}"
                                        alt="{{ $dest->name }}" style="width: 100%; height: 100%;" />
                                    <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                                        @if (App::isLocale('id'))
                                            {!! nl2br($dest->description) !!}
                                        @elseif(App::isLocale('en'))
                                            {!! nl2br($dest->description_en) !!}
                                        @else
                                            {!! nl2br($dest->description_mandarin) !!}
                                        @endif
                                    </p>
                                </div>
                            </details>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="kanan col-12 ms-auto">
            <div class="flex mt-4 m-auto justify-content-center">
                <div class="relative flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    @if (App::isLocale('id'))
                        <a href="{{ url('https://wa.link/6737vy') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i> <br>{{ __('detail_layanan.book_wa') }}
                        </a>
                    @elseif(App::isLocale('en'))
                        <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                        </a>
                    @else
                        <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                            target="_blank">
                            <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                        </a>
                    @endif
                    </a>
                </div>
                <div
                    class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-envelope"></i><br> {{ __('detail_layanan.book_email') }}
                    </a>
                </div>
                <div
                    class="relative ms-2 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('weixin://dl/chat?eastpearl_id') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-chat"></i> <br> {{ __('detail_layanan.book_wechat') }}
                    </a>
                </div>
            </div>
            <div class="flex justify-content-left">
                <div
                    class="relative w-100 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('https://eastpearl-online.globaltix.com/') }}" class="btn text-white "
                        id="but_wisata">
                        <i class="uil uil-schedule"></i> <br> Booking Online
                    </a>
                </div>
            </div>

            <div>
                <div class="flex flex-col">

                    <span
                        class="trip_lainnya font-semibold text-gray-900">{{ __('detail_layanan.trip_lainnya') }}</span>
                    <span class="">{{ __('detail_layanan.rekomendasi') }}</span>
                </div>
                @foreach ($other_services->take(3) as $ots)
                    <a href="{{ url('/layanan/detail/' . $ots->slug) }}">

                        <div
                            class="relative flex flex-col mt-2 rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                            <img class="rounded-xl" src="{{ url("/assets/services/$ots->image") }}"
                                alt="{{ $ots->slug }}" style="width: 100%; height: 10rem;" />
                            <div class="m-3 flex flex-col">
                                <span class="title2 font-semibold text-gray-900 ">
                                    @if (App::isLocale('id'))
                                        {{ $ots->name }}
                                    @elseif(App::isLocale('en'))
                                        {{ $ots->name_en }}
                                    @else
                                        {{ $ots->name_mandarin }}
                                    @endif
                                </span>

                                @if (App::isLocale('id'))
                                    {!! nl2br(strlen($ots->short_desc) > 200 ? substr($ots->short_desc, 0, 200) . '...' : $ots->short_desc) !!}
                                @elseif(App::isLocale('en'))
                                    {!! nl2br(strlen($ots->short_desc_en) > 200 ? substr($ots->short_desc_en, 0, 200) . '...' : $ots->short_desc_en) !!}
                                @else
                                    {!! nl2br(
                                        strlen($ots->short_desc_mandarin) > 200
                                            ? substr($ots->short_desc_mandarin, 0, 200) . '...'
                                            : $ots->short_desc_mandarin,
                                    ) !!}
                                @endif

                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="flex mt-4 justify-content-center">
        <div class="relative flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            @if (App::isLocale('id'))
                <a href="{{ url('https://wa.link/6737vy') }}" class="btn text-white " id="but_wisata"
                    target="_blank">
                    <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                </a>
            @elseif(App::isLocale('en'))
                <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                    target="_blank">
                    <i class="uil uil-whatsapp"></i> <br>{{ __('detail_layanan.book_wa') }}
                </a>
            @else
                <a href="{{ url('https://wa.link/uyw6tn') }}" class="btn text-white " id="but_wisata"
                    target="_blank">
                    <i class="uil uil-whatsapp"></i><br> {{ __('detail_layanan.book_wa') }}
                </a>
            @endif
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-envelope"></i><br> {{ __('detail_layanan.book_email') }}
            </a>
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('weixin://dl/chat?eastpearl_id') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-chat"></i> <br> {{ __('detail_layanan.book_wechat') }}
            </a>
        </div>
    </div>
    <div class="flex justify-content-left">
        <div class="relative w-100 flex flex-col rounded-xl bg-success bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('https://eastpearl-online.globaltix.com/') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-schedule"></i> <br> Booking Online
            </a>
        </div>
    </div>

</div>
<div class="clearfix mb-5"></div>
<!-- stylesheet -->
<link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>

<script>
    function goBack() {
        window.history.back();
    }

    // Menggunakan JavaScript untuk menentukan apakah harus menambahkan atribut `open` pada elemen `details` pertama
    document.addEventListener('DOMContentLoaded', function() {
        var details = document.querySelectorAll('details');
        if (details.length > 0) {
            details[0].setAttribute('open', 'true');
        }
    });
</script>
@endsection
