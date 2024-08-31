@extends('user.template')

<?php
use Illuminate\Support\Facades\App;
?>

@section('title')
    {{ __('souvenir.title') }}
@endsection

@section('cover')
    <?= url('assets/bg/souvenir.png') ?>
@endsection
{{-- <script src="https://cdn.tailwindcss.com"></script>     --}}


@section('content')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-26YC4R3P36"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BV3NGNRL2G');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <form action="{{ url('souvenir') }}" method="get">
        <section class="ftco-section services-section" style="margin-top:2rem; margin-bottom:2rem;">
            <div class="container-lg">
                <p class="text-dark" style="font-size: 26px; font-weight: 600;">
                    {{ __('souvenir.title') }}</p>
                <p style="font-size: 20px; font-weight: 400; margin-top:-1rem;"> {{ __('souvenir.desc_title') }}</p>

                <div class="row">
                    <div class="col-lg-4 col-sm-12 mt-4">
                        <h5 class="mb-0">{{ __('souvenir.search_souvenir') }}</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-4">
                                <hr style="height: 2px;
								background-color: #0F304F;
								border: none;">
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                        <div class="input-group w-100 mt-1">
                            <input type="text" id="icons-filter" name="keyword" class="form-control border-end-0"
                                value="{{ isset($_GET['keyword']) ? $_GET['keyword'] : '' }}"
                                placeholder="{{ __('souvenir.search_souvenir_placeholder') }}">
                            <button type="submit" class="input-group-text bg-white border-start-0">
                                <i class="uil uil-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-12 mt-4">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="mb-0">{{ __('souvenir.search_categories') }}</h5>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <hr
                                            style="height: 2px;
										background-color: #0F304F;
										border: none;">
                                        <div class="col-lg-6"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="float-end mt-2">
                                    {{-- <input class="form-check-input" style="display: none" id="cat-list-0"
									onchange="submit()" type="checkbox" name="cat_list[]" value="0">
								<label for="cat-list-0" class="form-check-label btn btn-sm text-white text-sm"
									style="background-color: #0F304F;">Reset Kategori </label> --}}
                                    <?php
                                    if (isset($_GET['keyword'])) {
                                        $cari = $_GET['keyword'];
                                    } else {
                                        $cari = '';
                                    }
                                    ?>
                                    <a href="{{ url('souvenir?keyword=' . $cari) }}" class="btn btn-sm text-white text-sm"
                                        style="background-color: #0F304F;">
                                        {{ __('souvenir.search_categories_reset') }}</a>
                                </div>
                            </div>
                        </div>
                        {{-- versi select option --}}
                        {{-- <select class="form-select" aria-label="Default select example" name="cat_list[]"
						onchange="submit()">
						<option value="0" {{ !empty($cat_list[0]) ? 'selected' : '' }}>Semua Kategori</option>
						@foreach ($categories as $category)
						<option value="{{ $category->id }}" {{ !empty($cat_list[$category->id]) ? 'selected' : '' }}>{{
							$category->name }}</option>
						@endforeach
					</select> --}}

                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                            {{-- semua kategori --}}
                            {{-- <div class="col">
							<div class="">
								<div class="form-check form-check-inline">
									<input class="form-check-input" id="cat-list-0" {{ !empty($cat_list[0]) ? 'checked'
										: '' }} onchange="submit()" type="radio" name="cat_list[]" value="0">
									<label for="cat-list-0" class="form-check-label">Semua Kategori </label>
								</div>
							</div>
						</div> --}}
                            @foreach ($categories as $category)
                                <div class="col">
                                    <div class="">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" id="cat-list-{{ $loop->iteration }}"
                                                {{ !empty($cat_list[$category->id]) ? 'checked' : '' }} onchange="submit()"
                                                type="checkbox" name="cat_list[]" value="{{ $category->id }}">

                                            <label class="form-check-label" for="cat-list-{{ $loop->iteration }}">
                                                @if (App::isLocale('id'))
                                                    {{ $category->name }}
                                                @elseif (App::isLocale('en'))
                                                    {{ $category->name_en }}
                                                @else
                                                    {{ $category->name_mandarin }}
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <section id="content">
        <div class="content-wrap bg-light">
            <div class="container-lg">
                @if (count($souvenir) == 0)
                    <div class="text-center">
                        {{ __('souvenir.not_found') }}
                    </div>
                @endif
                <div class="row g-4 mb-5">
                    @foreach ($souvenir as $svr)
                        <article class="entry event col-md-6 col-lg-4 mb-0 d-flex align-items-stretch">
                            <div
                                class="grid-inner bg-white row g-0 p-2 border-0 rounded-5 shadow-sm h-shadow all-ts h-translate-y-sm">
                                <div class="col-12 mb-md-0">
                                    <a href="{{ url('detail-souvenir/' . $svr->slug) }}" class="entry-image mb-2">
                                        <img src="{{ url('assets/souvenir/' . $svr->image) }}"
                                            alt="Inventore voluptates velit totam ipsa tenetur" class="rounded-5">
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content justify-content-start align-items-start">
                                                <div class="badge bg-light text-dark rounded-pill">
                                                    @if (App::isLocale('id'))
                                                        {{ $svr->category_name }}
                                                    @elseif (App::isLocale('en'))
                                                        {{ $svr->category_name_en }}
                                                    @else
                                                        {{ $svr->category_name_mandarin }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 p-4 pt-0 pb-1">
                                    <div class="entry-title nott">
                                        <h3><a href="{{ url('detail-souvenir/' . $svr->slug) }}">
                                                @if (App::isLocale('id'))
                                                    {{ $svr->name }}
                                                @elseif (App::isLocale('en'))
                                                    {{ $svr->name_en }}
                                                @else
                                                    {{ $svr->name_mandarin }}
                                                @endif
                                            </a></h3>
                                    </div>
                                    {{-- <div class="entry-meta no-separator mb-1">
                                        <ul>
                                            <li class="text-capitalize">
                                                <h5> <span class="badge" style="background-color: #0F304F">
                                                        @if (App::isLocale('id'))
                                                            {{ $svr->category_name }}
                                                        @elseif (App::isLocale('en'))
                                                            {{ $svr->category_name_en }}
                                                        @else
                                                            {{ $svr->category_name_mandarin }}
                                                        @endif
                                                    </span></h5>
                                            </li>
                                        </ul>
                                    </div> --}}
                                    {{-- fasilitas --}}
                                    {{-- <div class="mb-3">
								<div class="fw-bold">{{ nl2br($svr->facilities) }}</div>
							</div> --}}
                                    <div class="mt-2">
                                        <div>
                                            @if ($svr->disc_price != null)
                                                <div class="d-flex">
                                                    <div>
                                                        <s>
                                                            Rp.<?= number_format($svr->price, 0, ',', '.') ?>
                                                        </s>
                                                    </div>
                                                    <div class="ms-2 fw-bold fs-4">
                                                        <mark> Rp.<?= number_format($svr->disc_price, 0, ',', '.') ?>
                                                        </mark>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="fw-bold">
                                                    Rp.<?= number_format($svr->price, 0, ',', '.') ?>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="entry-meta no-separator mb-3">
                                        @if (App::isLocale('id'))
                                            {!! nl2br(strlen($svr->desc) > 300 ? substr($svr->desc, 0, 300) . '...' : $svr->desc) !!}
                                        @elseif(App::isLocale('en'))
                                            {!! nl2br(strlen($svr->desc_en) > 300 ? substr($svr->desc_en, 0, 300) . '...' : $svr->desc_en) !!}
                                        @else
                                            {!! nl2br(strlen($svr->desc_mandarin) > 300 ? substr($svr->desc_mandarin, 0, 300) . '...' : $svr->desc_mandarin) !!}
                                        @endif
                                    </div>

                                    @if (
                                        $svr->link_shopee != null ||
                                            $svr->link_amazon != null ||
                                            $svr->link_alibaba != null ||
                                            $svr->link_tokopedia != null ||
                                            $svr->link_blibli != null)
                                        <div class="entry-meta no-separator mb-3">
                                            <ul class="d-flex justify-content-center list-unstyled">
                                                @if ($svr->link_shopee != null)
                                                    <li class="mx-2">
                                                        <a target="_blank" href="{{ $svr->link_shopee }}"
                                                            class="fw-normal text-dark">
                                                            <img src="https://img.icons8.com/color/48/000000/shopee.png"
                                                                alt="Shopee" width="50" height="50">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($svr->link_amazon != null)
                                                    <li class="mx-2">
                                                        <a target="_blank" href="{{ $svr->link_amazon }}"
                                                            class="fw-normal text-dark">
                                                            <img src="https://img.icons8.com/color/48/000000/amazon.png"
                                                                alt="Amazon" width="50" height="50">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($svr->link_alibaba != null)
                                                    <li class="mx-2">
                                                        <a target="_blank" href="{{ $svr->link_alibaba }}"
                                                            class="fw-normal text-dark">
                                                            <img src="https://cdn4.iconfinder.com/data/icons/flat-brand-logo-2/512/alibaba-512.png"
                                                                alt="Alibaba" width="50" height="50">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($svr->link_tokopedia != null)
                                                    <li class="mx-2">
                                                        <a target="_blank" href="{{ $svr->link_tokopedia }}"
                                                            class="fw-normal text-dark">
                                                            <img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/arael/kratos/0e535d90.png"
                                                                alt="Tokopedia" width="50" height="50">
                                                        </a>
                                                    </li>
                                                @endif
                                                @if ($svr->link_blibli != null)
                                                    <li class="mx-2">
                                                        <a target="_blank" href="{{ $svr->link_blibli }}"
                                                            class="fw-normal text-dark">
                                                            <img src="https://storage.googleapis.com/static-cms-prod/2023/10/color.jpg"
                                                                alt="Blibli" width="50" height="50">
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif

                                    <div class=" ">
                                        <a href="https://wa.me/6285292252220?text=Halo,%20saya%20ingin%20membeli%20souvenir%20{{ $svr->name }}."
                                            target="_blank">
                                            <button class="btn btn-danger fw-semibold shadow-sm w-100" type="button">
                                                @if (App::isLocale('id'))
                                                    Beli
                                                @elseif (App::isLocale('en'))
                                                    Buy
                                                @else
                                                    买
                                                @endif
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{ $souvenir->links('vendor.pagination.canvas') }}
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (!window.location.pathname.includes('/souvenir/')) {
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = 'https://cdn.tailwindcss.com';
            document.head.appendChild(link);
        }
    });
</script>
