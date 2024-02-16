@extends('user.template')

@section('title')
    {{ __('services.our_services') }}
@endsection

@section('cover')
    <?= url('assets/layanan-jasa/bg.png') ?>
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

    {{-- <div class="container-lg mt-5">
        <h1 class="text-center mb-5">
            <b>{{ __('services.we_have_professional_services') }}</b>
            <br>
            <b class="text-warning">{{ __('services.ready_for_change_your_idea') }}</b>
        </h1>
        <div class="container mt-5">
            <div class="card shadow">
                <div class="card-body p-5">
                    <h1 class="text-center mb-5">
                        <b>{{ __('services.service_offers') }}</b>
                    </h1>
                    <div class="row justify-content-center pb-5 mb-5 border-bottom">
                        <div class="col-md-12 col-lg-4 align-items-center">
                            <img src="{{ url('assets/layanan-jasa/konsultan.png') }}" width="95%"
                                class="img-fluid mb-4 mb-lg-0">
                        </div>
                        <div class="col-md-12 col-lg-8 align-self-center">
                            <p class="h3">{{ strtoupper(__('services.service_consultant')) }}</p>
                            <p class="h4 text-warning">
                                <i class="fa-solid fa-user-friends"></i>
                                {{ __('services.service_sub_global_qualification') }}
                            </p>
                            <p>
                                {{ __('services.service_detail_one') }}
                            </p>
                            <p>
                                <a href="{{ url('layanan-jasa/konsultan') }}" class="text-warning">
                                    {{ __('services.read_more') }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center pb-5 mb-5 border-bottom">
                        <div class="col-md-12 col-lg-4 align-items-center">
                            <img src="{{ url('assets/layanan-jasa/konseptor.png') }}" width="95%"
                                class="img-fluid mb-4 mb-lg-0">
                        </div>
                        <div class="col-md-12 col-lg-8 align-self-center">
                            <p class="h3">{{ strtoupper(__('services.service_conceptor')) }}</p>
                            <p class="h4 text-warning">
                                <i class="fa-solid fa-user-friends"></i>
                                {{ __('services.service_sub_global_qualification') }}
                            </p>
                            <p>
                                {{ __('services.service_detail_one') }}
                            </p>
                            <p>
                                <a href="{{ url('layanan-jasa/konseptor') }}" class="text-warning">
                                    {{ __('services.read_more') }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center pb-5 mb-5 border-bottom">
                        <div class="col-md-12 col-lg-4 align-items-center">
                            <img src="{{ url('assets/layanan-jasa/pemasaran.png') }}" width="95%"
                                class="img-fluid mb-4 mb-lg-0">
                        </div>
                        <div class="col-md-12 col-lg-8 align-self-center">
                            <p class="h3">{{ strtoupper(__('services.service_marketing')) }}</p>
                            <p class="h4 text-warning">
                                <i class="fa-solid fa-user-friends"></i>
                                {{ __('services.service_sub_fasilitator') }}
                            </p>
                            <p>
                                {!! __('services.service_detail1_one') !!}
                            </p>
                            <p>
                                <a href="{{ url('layanan-jasa/pemasaran') }}" class="text-warning">
                                    {{ __('services.read_more') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5"></div>
        <div class="clearfix"></div>
        <div class="mt-5 mb-5"></div>
    </div> --}}
@endsection
