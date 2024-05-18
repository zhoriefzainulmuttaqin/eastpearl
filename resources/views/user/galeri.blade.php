@extends('user.template')

@section('title')
    Gallery
@endsection
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@section('cover')
    <?= url('assets/bg/tentang.jpg') ?>
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
    <div class="container-lg mt-5">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-dark">
            {!! nl2br(__('galeri.keseruan')) !!}
        </h1>
        <p class="text-lg mb-4 font-normal text-gray-500 lg:text-1xl dark:text-gray-400">
            {{ __('galeri.text_keseruan') }}
        </p>
        <div class="container">
            @foreach ($categories as $category)
                <div class="text-center mb-4 mt-2">
                    <p style="font-size: 26px; font-weight: 400;">
                        <b>
                            @if (App::isLocale('id'))
                                {{ $category->name }}
                            @elseif(App::isLocale('en'))
                                {{ $category->name_en }}
                            @else
                                {{ $category->name_mandarin }}
                            @endif
                        </b>
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($category->galeri as $gallery)
                        @if ($gallery)
                            <div class="grid gap-12">
                                <div>
                                    <img class="h-auto max-w-full rounded-lg"
                                        src="{{ url('assets/galeri/' . $gallery->image) }}" alt="{{ $gallery->name }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>


    <div class="clearfix mb-5"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
