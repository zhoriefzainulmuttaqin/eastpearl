@extends('user.template')

@section('title')
    About Us
@endsection


@section('cover')
    <?= url('assets/bg/tentang.jpg') ?>
@endsection

@section('style')
    <style>
        .judul {
            font-size: 28px;
            font-weight: 600;
        }
    </style>
@endsection

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

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
    @foreach ($about as $tentang)
        <div class="container-lg mt-5">

            <div class="text-center">
                <span class="judul">{{ __('about.alasan') }}</span>
            </div>
            <div class="mt-4" style="text-align:justify; padding-left: 50px; padding-right: 50px;">
                <span class="isi">
                    @if (App::isLocale('id'))
                        {!! nl2br(__($tentang->long_description)) !!}
                    @elseif(App::isLocale('en'))
                        {!! nl2br(__($tentang->long_description_en)) !!}
                    @else
                        {!! nl2br(__($tentang->long_description_mandarin)) !!}
                    @endif

                </span>
            </div>

            <div class="text-center mt-5">
                <span class="judul">{{ __('about.galeri') }}</span>
            </div>
            <div class="grid grid-cols-3 md:grid-cols-4 gap-4 mt-4">
                @foreach ($galeri as $galleries)
                    <div class="grid gap-12">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ url('assets/galeri/' . $galleries->image) }}"
                                alt="{{ $galleries->name }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-6">
            <iframe src="{{ $tentang->link_maps }}" width="800" height="400" style="border:0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @endforeach

    {{-- <div class="clearfix mb-5"></div> --}}
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <!-- Ripple Effect -->
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
@endsection
