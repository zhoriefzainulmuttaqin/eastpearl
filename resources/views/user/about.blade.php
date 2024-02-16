@extends('user.template')

@section('title')
    {{ __('event.title') }}
@endsection

@section('cover')
    <?= url('assets/bg/imageevent.png') ?>
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

    </div>
    <div class="clearfix mb-5"></div>
@endsection
