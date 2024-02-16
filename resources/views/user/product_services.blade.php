@extends('user.template')

<?php
use Illuminate\Support\Facades\App;
?>

@section('title')
    {{ __('services.product_services') }}
@endsection

@section('style')
    <style>
        #service-floating-card {
            margin-top: 10%;
        }

        <div class="col-4 text-center"><a href="/layanan-produk"><img src="{{ url('assets/layanan-produk/paketOlehIcon.png') }}" class="img-fluid img_layanan" width="200px"><br></a></div>.fixed-height {
            height: 700px !important;

        }

        @media (max-width: 760px) {
            #service-floating-card {
                margin-top: 30%;
            }
        }
    </style>
@endsection

@section('cover')
    <?= url('assets/layanan-produk/bg.png') ?>
@endsection

{{-- @section('content')
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
    <div class="container text-center" id="service-floating-card">
        <div class="card shadow">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-4 text-center p-4 p-md-0">
                        <img src="{{ url('assets/layanan-produk/TCardIcon.png') }}" class="img-fluid" width="100px">
                        <br>
                        <!--<div class="d-none d-md-block">-->
                        <!--    <b>Tourism Card</b>-->
                        <!--</div>-->
                        <!--<div class="d-block d-md-none">-->
                        <!--    <b style="font-size:12px">Tourism Card</b>-->
                        <!--</div>-->
                    </div>
                    <div class="col-4 text-center p-4 p-md-0">
                        <img src="{{ url('assets/layanan-produk/TPackIcon.png') }}" class="img-fluid" width="100px">
                        <br>
                        <!--<div class="d-none d-md-block">-->
                        <!--    <b>{{ __('services.tour_packages') }}</b>-->
                        <!--</div>-->
                        <!--<div class="d-block d-md-none">-->
                        <!--    <b style="font-size:12px">{{ __('services.tour_packages') }}</b>-->
                        <!--</div>-->
                    </div>
                    <div class="col-4 text-center p-4 p-md-0">
                        <img src="{{ url('assets/layanan-produk/paketOlehIcon.png') }}" class="img-fluid" width="100px">
                        <br>
                        <!--<div class="d-none d-md-block">-->
                        <!--    <b>{{ __('services.souvenirs') }}</b>-->
                        <!--</div>-->
                        <!--<div class="d-block d-md-none">-->
                        <!--    <b style="font-size:12px">{{ __('services.souvenirs') }}</b>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container-lg">
        <h1 class="text-center mb-5">
            <b>Tourism Card</b>
        </h1>
        <div class="row mt-5">
            <div class="col-md-12 p-3 p-md-5">
                <div class="card shadow" id="BuyTourismCard">
                    <div class="card-body p-5">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-5 align-items-center">
                                <img src="{{ url('assets/layanan-produk/mockup-tourism-card.png') }}" width="95%"
                                    class="img-fluid mb-4 mb-lg-0">
                            </div>
                            <div class="col-md-12 col-lg-7 align-self-center">
                                <p class="h3">
                                    {!! __('services.tourism_card_detail_one') !!}
                                </p>
                                <p class="h3">
                                    {!! __('services.tourism_card_detail_two') !!}

                                </p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row mt-5">
                            <div class="col-md-12 d-grid gap-2">
                                <a href="{{ url('layanan-produk/tourism-card') }}" class="btn btn-success btn-lg">
                                    {{ __('services.buy') }} Tourism Card
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5"></div>
        <div class="clearfix"></div>
        <h1 class="text-center mb-3">
            <b>{{ __('services.tour_packages') }}</b>
        </h1>
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            @foreach ($patterns as $pattern)
                <div class="col-sm-12 col-md-6 p-3 p-md-5 d-flex align-items-stretch">
                    <div class="card rounded shadow fixed-height">
                        <img src="{{ url('assets/patterns/' . $pattern->cover_picture) }}" class="card-img-top">
                        <div class="card-body" style="padding-left: 10%; padding-right: 10%;">
                            @if (App::isLocale('id'))
                                <b class="h3">{{ $pattern->name }}</b>
                                <p>
                                    {!! $pattern->details !!}
                                </p>
                            @else
                                <b class="h3">{{ $pattern->name_en }}</b>
                                <p>
                                    {!! $pattern->details_en !!}
                                </p>
                            @endif
                            <p>
                                <a href="{{ url('paket-wisata/' . $pattern->slug) }}"
                                    class="btn btn-info bg-btn-visit text-white">
                                    {{ __('services.show_details') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="clearfix"></div>
        <h1 class="text-center mt-5 mb-3">
            <b>{{ __('services.souvenirs') }}</b>
        </h1>
        <div class="clearfix"></div>
        <div class="row justify-content-center">
            @foreach ($gifts as $gift)
                <div class="col-sm-12 col-md-6 p-3 p-md-4 mb-3 mb-md-0 d-flex align-items-stretch">
                    <div class="card rounded shadow">
                        <div class="card-body" style="padding-left: 10%; padding-right: 10%;">
                            <img src="{{ url('assets/layanan-produk/' . $gift->picture) }}" class="img-fluid rounded"
                                width="100%">
                            <h4 class="text-center mt-5">
                                <b>
                                    @if (App::isLocale('id'))
                                        {{ $gift->name }}
                                    @else
                                        {{ $gift->name_en }}
                                    @endif
                                </b>
                            </h4>
                            <div class="container">
                                <p class='h4'>
                                    <b>
                                        Rp. {{ number_format($gift->price, 0, ',', '.') }} ,- <br>
                                        {{ __('services.package_weight') }} {{ $gift->weight }} gram <br>
                                        {{ __('services.package_contents') }} ({{ $gift->contents_count }}
                                        {{ __('services.products') }})
                                    </b>
                                    <br>
                                    @if (App::isLocale('id'))
                                        {!! nl2br($gift->contents) !!}
                                    @else
                                        {!! nl2br($gift->contents_en) !!}
                                    @endif
                                </p>
                                <div class="row mt-5">
                                    <div class="col-md-12 d-grid gap-2">
                                        <a href="{{ url('beli-layanan-produk/' . $gift->slug) }}"
                                            class="btn btn-success btn-lg">
                                            {{ __('services.buy_package') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="clearfix mb-5"></div>
@endsection --}}
