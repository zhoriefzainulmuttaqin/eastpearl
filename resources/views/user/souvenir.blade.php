@extends('user.template')

<?php
use Illuminate\Support\Facades\App;
?>

@section('title')
    {{ __('tours.title') }}
@endsection

@section('cover')
    <?= url('assets/bg/speed.jpg') ?>
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

        gtag('config', 'G-BV3NGNRL2G');
    </script>


    <form action="{{ url('souvenir') }}" method="get">
        <section class="ftco-section services-section" style="margin-top:2rem; margin-bottom:2rem;">
            <div class="container">
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
                                    <a href="{{ url('wisata?keyword=' . $cari) }}" class="btn btn-sm text-white text-sm"
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
            <div class="container">
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
                                    <a href="{{ url('detail-wisata/' . $svr->slug) }}" class="entry-image mb-2">
                                        <img src="{{ url('assets/wisata/' . $svr->picture) }}"
                                            alt="Inventore voluptates velit totam ipsa tenetur" class="rounded-5">
                                        <div class="bg-overlay">
                                            <div class="bg-overlay-content justify-content-start align-items-start">
                                                <div class="badge bg-light text-dark rounded-pill">{{ $svr->city }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 p-4 pt-0 pb-1">
                                    <div class="entry-title nott">
                                        <h3><a href="{{ url('detail-wisata/' . $svr->slug) }}">
                                                @if (App::isLocale('id'))
                                                    {{ $svr->name }}
                                                @else
                                                    {{ $svr->name_en }}
                                                @endif
                                            </a></h3>
                                    </div>
                                    <div class="entry-meta no-separator mb-3">
                                        <ul>
                                            <li><a target="_blank" href="{{ $svr->link_maps }}" class="fw-normal"><i
                                                        class="uil text-warning uil-map-marker"></i> {{ $svr->address }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-meta no-separator mb-1">
                                        <ul>
                                            <li class="text-capitalize">
                                                <h5> <span class="badge" style="background-color: #0F304F">
                                                        @if (App::isLocale('id'))
                                                            {{ $svr->category_name }}
                                                        @else
                                                            {{ $svr->category_name_en }}
                                                        @endif
                                                    </span></h5>
                                            </li>
                                        </ul>
                                    </div>
                                    {{-- fasilitas --}}
                                    {{-- <div class="mb-3">
								<div class="fw-bold">{{ nl2br($svr->facilities) }}</div>
							</div> --}}
                                    <div class="mb-3">
                                        <div class="fw-bold">Rp. -
                                            {{-- <?= number_format($svr->price, 0, ',', '.') ?> --}}
                                        </div>
                                    </div>
                                    <div class="entry-meta no-separator mb-3">
                                        <ul>
                                            <li class="fw-normal text-warning"><i class="uil bi-telephone-fill"></i>
                                                {{-- {{ $svr->phone }}</li> --}} -
                                        </ul>
                                    </div>


                                    @if (
                                        $svr->link_youtube != null ||
                                            $svr->link_instagram != null ||
                                            $svr->link_facebook != null ||
                                            $svr->link_tiktok != null)
                                        <div class="entry-meta no-separator mb-3">
                                            <ul>
                                                @if ($svr->link_youtube != null)
                                                    <li><a target="_blank" href="{{ $svr->link_youtube }}"
                                                            class="fw-normal text-dark"><i class="uil uil-youtube"></i> </a>
                                                    </li>
                                                @endif
                                                @if ($svr->link_instagram != null)
                                                    <li><a target="_blank" href="{{ $svr->link_instagram }}"
                                                            class="fw-normal text-dark"><i class="uil bi-instagram"></i>
                                                        </a></li>
                                                @endif
                                                @if ($svr->link_facebook != null)
                                                    <li><a target="_blank" href="{{ $svr->link_facebook }}"
                                                            class="fw-normal text-dark"><i class="uil uil-facebook"></i>
                                                        </a></li>
                                                @endif
                                                @if ($svr->link_tiktok != null)
                                                    <li><a target="_blank" href="{{ $svr->link_tiktok }}"
                                                            class="fw-normal text-dark"><i
                                                                class="uil fa-brands fa-tiktok"></i> </a>
                                                    </li>
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
                                    <div class="entry-meta no-separator d-flex ">
                                        <ul class="me-auto">
                                            <li><a href="{{ url('layanan-produk/tourism-card') }}"
                                                    class="fw-normal text-dark"><i
                                                        class="uil uil-ticket text-warning"></i>
                                                    Disc. Card</a></li>
                                        </ul>

                                        <ul class="ms-auto">
                                            <li><a href="{{ url('detail-wisata/' . $svr->slug) }}"
                                                    class="fw-normal text-dark">
                                                    {{ __('souvenir.show_more') }}
                                                    <i class="uil bi-arrow-right-circle"></i></a>
                                            </li>
                                        </ul>
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
