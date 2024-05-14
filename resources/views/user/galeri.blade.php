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
    <div class="container-lg mt-5">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-4xl dark:text-dark">
            {{ __('galeri.keseruan') }}</span>
        </h1>
        <p class="text-lg mb-4 font-normal text-gray-500 lg:text-1xl dark:text-gray-400">
            {{ __('galeri.text_keseruan') }}
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($galeri as $galleries)
                <div class="grid gap-12">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ url('assets/galeri/' . $galleries->image) }}"
                            alt="">
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <script></script>

    <div class="clearfix mb-5"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
