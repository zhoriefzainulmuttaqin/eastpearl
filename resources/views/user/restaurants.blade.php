@extends('user.template')

<?php
use Illuminate\Support\Facades\App;
?>

@section('title')
    {{ __('restaurants.title') }}
@endsection

@section('cover')
    <?= url('assets/bg/kuliner.png') ?>
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

    <section class="ftco-section services-section" style="margin-top:2rem; margin-bottom:2rem;">
        <div class="container">
            <p class="text-dark" style="font-size: 26px; font-weight: 600;">
                {{ __('restaurants.title') }}</p>
            <p style="font-size: 20px; font-weight: 400; margin-top:-1rem;">{{ __('restaurants.desc_title') }}</p>

        </div>
    </section>

    <section id="content">
        <div class="content-wrap bg-light">
            <div class="container">
                <div class="row g-4 mb-5">
                    @foreach ($restaurants as $restaurant)
                        <article class="entry event col-md-6 col-lg-4 mb-0 d-flex align-items-stretch">
                            <div
                                class="grid-inner bg-white row g-0 p-2 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm">
                                <div class="col-12 mb-md-0">
                                    <div class="entry-image mb-2">
                                        <img src="{{ url('assets/kuliner/' . $restaurant->picture) }}"
                                            alt="Inventore voluptates velit totam ipsa tenetur" class="rounded-5">
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content justify-content-start align-items-start">
                                                <div class="badge bg-light text-dark rounded-pill">{{ $restaurant->city }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 p-4 pt-0 pb-1">
                                    <div class="entry-title nott">
                                        <h3>
                                            @if (App::isLocale('id'))
                                                {{ $restaurant->name }}
                                            @else
                                                {{ $restaurant->name_en }}
                                            @endif
                                        </h3>
                                    </div>
                                    <div class="entry-meta no-separator mb-3">
                                        <ul>
                                            <li class="fw-normal"><i class="uil text-warning uil-map-marker"></i>
                                                {{ $restaurant->address }}</li>
                                        </ul>
                                    </div>
                                    {{-- fasilitas --}}
                                    {{-- <div class="mb-3">
								<div class="fw-bold">{{ nl2br($restaurant->facilities) }}</div>
							</div> --}}
                                    <div class="mb-3">
                                        <div class="fw-bold">Rp. -
                                            {{-- <?= number_format($restaurant->price, 0, ',', '.') ?> --}}
                                        </div>
                                    </div>
                                    <div class="entry-meta no-separator mb-3">
                                        <ul>
                                            <li class="fw-normal text-warning"><i class="uil bi-telephone-fill"></i>
                                                {{-- {{ $restaurant->phone }}</li> --}} -
                                        </ul>
                                    </div>
                                    {{-- gk ada detail --}}
                                    {{-- <div class="entry-meta no-separator float-end">
								<ul>
									<li><a href="#" class="fw-normal text-dark"> Lihat Detail <i
												class="uil bi-arrow-right-circle"></i></a></li>
								</ul>
							</div> --}}
                                    @if (
                                        $restaurant->link_youtube != null ||
                                            $restaurant->link_instagram != null ||
                                            $restaurant->link_facebook != null ||
                                            $restaurant->link_tiktok != null)
                                        <div class="entry-meta no-separator mb-3">
                                            <ul>
                                                @if ($restaurant->link_youtube != null)
                                                    <li><a href="{{ $restaurant->link_youtube }}"
                                                            class="fw-normal text-dark"><i class="uil uil-youtube"></i> </a>
                                                    </li>
                                                @endif
                                                @if ($restaurant->link_instagram != null)
                                                    <li><a href="{{ $restaurant->link_instagram }}"
                                                            class="fw-normal text-dark"><i class="uil bi-instagram"></i>
                                                        </a></li>
                                                @endif
                                                @if ($restaurant->link_facebook != null)
                                                    <li><a href="{{ $restaurant->link_facebook }}"
                                                            class="fw-normal text-dark"><i class="uil uil-facebook"></i>
                                                        </a></li>
                                                @endif
                                                @if ($restaurant->link_tiktok != null)
                                                    <li><a href="{{ $restaurant->link_tiktok }}"
                                                            class="fw-normal text-dark"><i
                                                                class="uil fa-brands fa-tiktok"></i> </a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        {{-- @else
							<div class="entry-meta no-separator mb-3">
								<ul>
									<li class="fw-normal text-white"><i class="uil fa-brands bi-dot"></i></li>
								</ul>
							</div> --}}
                                    @endif
                                    <div class="entry-meta no-separator mb-3">
                                        <ul>
                                            <li><a href="{{ url('layanan-produk/tourism-card') }}"
                                                    class="fw-normal text-dark"><i class="uil uil-ticket text-warning"></i>
                                                    Disc. Card</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{ $restaurants->links('vendor.pagination.canvas') }}
                </div>
            </div>
        </div>
    </section>
@endsection
