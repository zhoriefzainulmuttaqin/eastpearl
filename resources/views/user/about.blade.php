@extends('user.template')

@section('title')
    {{ __('event.title') }}
@endsection


@section('cover')
    <?= url('assets/bg/tentang.png') ?>
@endsection

@section('style')
    <style>
        .judul {
            font-size: 28px;
            font-weight: 600;
        }
    </style>
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

    <div class="container-lg mt-5">
        <div class="text-center">
            <span class="judul">Mengapa Harus Memilih Kami</span class="judul">
        </div>

        <!-- stylesheet -->
        <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

        <!-- Ripple Effect -->
        <!-- from cdn -->
        <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    </div>
    <div class="clearfix mb-5"></div>
@endsection
