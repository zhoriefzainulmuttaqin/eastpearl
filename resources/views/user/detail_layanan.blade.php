@extends('user.template')

@section('title')
    {{ __('event.title') }}
@endsection
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@section('cover')
    <?= url('assets/bg/tentang.png') ?>
@endsection

@section('content')
@section('style')
    <style>
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
    </style>
@endsection
<div class="container-lg">

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
                    <span class="title font-semibold text-gray-900 ms-2">
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
                    <span class="price text-gray-600">{{ __('detail_layanan.start_from') }} Rp.
                        {{ number_format($services->price, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-content-between">
        <div class="kiri flex-col col-9 " style="padding-right: 20px;">
            <div class="relative flex flex-col  rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <img class="rounded-xl" src="{{ url("/assets/services/$services->image") }}"
                    alt="{{ $services->slug }}" style="width: cover; height: 100%;" />
            </div>
            <div class="relative mt-2 flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                <div class="titLin m-4 ">

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
                            <li>{{ $fas->name }}</li>
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
                            </span>{{ $services->minimal_peserta }}</li>
                        <li><span class="font-bold text-gray-700"> {{ __('detail_layanan.bulan') }}
                            </span>{{ $services->bulan_terbaik }}
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
                @foreach ($destination as $dest)
                    <div class="m-4">
                        <div class="py-5">
                            <details class="group">
                                <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                                    <span class="font-semibold text-gray-800">{{ $dest->name }}</span>
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
                                    <p class="text-neutral-600 m-3 group-open:animate-fadeIn">
                                        {{ $dest->description }}
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
                    <a href="{{ url('https://wa.link/yrs1zw') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-whatsapp"></i> {{ __('detail_layanan.book_wa') }}
                    </a>
                </div>
                <div
                    class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
                    <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                        <i class="uil uil-envelope"></i> {{ __('detail_layanan.book_email') }}
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
                                alt="{{ $ots->slug }}" style="width: cover; height: 100%;" />
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
                                    {!! nl2br($ots->short_desc) !!}
                                @elseif(App::isLocale('en'))
                                    {!! nl2br($ots->short_desc_en) !!}
                                @else
                                    {!! nl2br($ots->short_desc_mandarin) !!}
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
            <a href="{{ url('https://wa.link/yrs1zw') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-whatsapp"></i> {{ __('detail_layanan.book_wa') }}
            </a>
        </div>
        <div class="relative ms-2 flex flex-col mb-4 rounded-xl bg-danger bg-clip-border text-gray-700 shadow-lg">
            <a href="{{ url('mailto:info@eastpearl.id') }}" class="btn text-white " id="but_wisata">
                <i class="uil uil-envelope"></i> {{ __('detail_layanan.book_email') }}
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

<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
