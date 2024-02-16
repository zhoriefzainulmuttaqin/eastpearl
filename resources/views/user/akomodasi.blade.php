@extends('user.template')

@section('title')
    {{ __('accomodation.title') }}
@endsection

@section('cover')
    <?= url('assets/akomodasi/bg-2.jpg') ?>
@endsection
@section('style')
    <link rel="stylesheet" href="{{ url('canvas') }}/css/components/bs-rating.css">
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
        <form action="{{ url('akomodasi') }}" method="get">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-5 shadow border-0">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="search" class="form-control"
                                    value="{{ isset($_GET['keyword']) ? $_GET['keyword'] : '' }}" name="keyword"
                                    id="cari" placeholder="{{ __('accomodation.placeholder_search') }}">
                                <button class="btn btn-light" type="submit" id="button-addon2">
                                    <i class="bi-search fs-3"></i>
                                </button>
                            </div>
                            @if (isset($_GET['keyword']))
                                <a href="{{ url('akomodasi') }}"
                                    class="text-primary"><span>{{ __('accomodation.show_all_data') }}</span></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-3 mb-5 d-block d-md-none">
                    <div class="card ps-2 pt-2">
                        <div class="card-title">
                            <strong class="fs-6">
                                {{ __('accomodation.sort') }}
                            </strong>
                            <br>
                            {{ __('accomodation.desc_sort') }}
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input valid" type="radio" name="order_price" id="harga-tertinggi"
                                    {{ $order_price == 'desc' ? 'checked' : '' }} onchange="submit()" value="desc"
                                    data-gtm-form-interact-field-id="1">
                                <label class="form-check-label"
                                    for="harga-tertinggi">{{ __('accomodation.option_1') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input valid" type="radio" name="order_price" id="harga-terendah"
                                    {{ $order_price == 'asc' ? 'checked' : '' }} value="asc" onchange="submit()"
                                    data-gtm-form-interact-field-id="0">
                                <label class="form-check-label"
                                    for="harga-terendah">{{ __('accomodation.option_2') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="card-title">
                            <strong class="fs-6">
                                {{ __('accomodation.sort_2') }}
                            </strong>
                            <a href="{{ url('/akomodasi') }}" class="float-end text-warning fw-bold">
                                {{ __('accomodation.reset') }}
                            </a>
                            <br>
                            {{ __('accomodation.desc_sort_2') }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <strong class="fs-5">
                                {{ __('accomodation.stars') }}
                            </strong>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['100']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="100"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span class="star"
                                                title="One Star"><span class="bi-star"></span></span><span class="star"
                                                title="Two Stars"><span class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span><span class="star"
                                                title="Four Stars"><span class="bi-star"></span></span><span class="star"
                                                title="Five Stars"><span class="bi-star"></span></span></span><span
                                            class="filled-stars" style="width: 100%;"><span class="star"
                                                title="One Star"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Four Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Five Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['80']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="80"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span><span
                                                class="star" title="Four Stars"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Two Stars"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Three Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Four Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['60']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="60"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span></span><span
                                            class="filled-stars" style="width: 100%;"><span class="star"
                                                title="One Star"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['40']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="40"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Two Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['20']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="20"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 mb-3 mb-sm-0">
                    @foreach ($accomodations as $accomodation)
                        <div class="card shadow h-shadow-sm h-shadow all-ts h-translate-y-sm mb-5 overflow-hidden"
                            style="border-radius: 40px">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src='{{ url("assets/akomodasi/$accomodation->cover_picture") }}'
                                        class="img-fluid w-100 h-100" alt="...">
                                </div>
                                <div class="col-md-7 ps-3 pe-1">
                                    <h4 class="card-title fs-3">
                                        <br>
                                        <a href='{{ url("/detail-akomodasi/$accomodation->slug") }}'
                                            class="link-underline-opacity-0 link-info text-dark mt-4">
                                            @if (App::isLocale('id'))
                                                {{ $accomodation->name }}
                                            @else
                                                {{ $accomodation->name_en }}
                                            @endif
                                        </a>
                                        <br>
                                        <div class="rating-container theme-krajee-svg rating-sm rating-animate">
                                            <small class="p-2 rounded text-white me-2 my-2"
                                                style="background-color: #0F304F">
                                                {{ $accomodation->city }}
                                            </small>
                                            @if ($accomodation->star)
                                                <div class="rating-stars" tabindex="0">
                                                    <span class="empty-stars">
                                                        <span class="star" title="One Star"><span
                                                                class="bi-star"></span></span>
                                                        <span class="star" title="Two Stars"><span
                                                                class="bi-star"></span></span>
                                                        <span class="star" title="Three Stars"><span
                                                                class="bi-star"></span></span>
                                                        <span class="star" title="Four Stars"><span
                                                                class="bi-star"></span></span>
                                                        <span class="star" title="Five Stars"><span
                                                                class="bi-star"></span></span>
                                                    </span>
                                                    <span class="filled-stars"
                                                        style="width: {{ $accomodation->star }}%;">
                                                        <span class="star" title="One Star"><span
                                                                class="bi-star-fill"></span></span>
                                                        <span class="star" title="Two Stars"><span
                                                                class="bi-star-fill"></span></span>
                                                        <span class="star" title="Three Stars"><span
                                                                class="bi-star-fill"></span></span>
                                                        <span class="star" title="Four Stars"><span
                                                                class="bi-star-fill"></span></span>
                                                        <span class="star" title="Five Stars"><span
                                                                class="bi-star-fill"></span></span>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-lg fw-normal fs-5 mt-3">
                                            <i class="uil fs-3 text-warning uil-map-marker"></i>
                                            {{ $accomodation->address }}
                                        </div>
                                    </h4>
                                    <button class="btn my-1 btn-danger">
                                        <a href="{{ url("/detail-akomodasi/$accomodation->slug") }}"
                                            class="fw-normal text-white">Lihat Detail</a>
                                    </button>
                                    <div class="row mt-2 justify-content-between my-3">
                                        <div class="col-md-12">
                                            @if (
                                                $accomodation->link_youtube != null ||
                                                    $accomodation->link_instagram != null ||
                                                    $accomodation->link_facebook != null ||
                                                    $accomodation->link_tiktok != null)
                                                <div class="entry-meta no-separator mb-3">
                                                    <ul>
                                                        @if ($accomodation->link_youtube != null)
                                                            <li><a href="{{ $accomodation->link_youtube }}"
                                                                    class="fw-normal text-dark"><i
                                                                        class="uil uil-youtube fs-1"></i>
                                                                </a></li>
                                                        @endif
                                                        @if ($accomodation->link_instagram != null)
                                                            <li><a href="{{ $accomodation->link_instagram }}"
                                                                    class="fw-normal text-dark"><i
                                                                        class="uil bi-instagram fs-1"></i>
                                                                </a></li>
                                                        @endif
                                                        @if ($accomodation->link_facebook != null)
                                                            <li><a href="{{ $accomodation->link_facebook }}"
                                                                    class="fw-normal text-dark"><i
                                                                        class="uil uil-facebook fs-1"></i>
                                                                </a></li>
                                                        @endif
                                                        @if ($accomodation->link_tiktok != null)
                                                            <li><a href="{{ $accomodation->link_tiktok }}"
                                                                    class="fw-normal text-dark"><i
                                                                        class="uil fa-brands fa-tiktok fs-1"></i> </a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @else
                                                <div class="entry-meta no-separator mb-3">
                                                    <ul>
                                                        <li class="fw-normal text-white"><i
                                                                class="uil fa-brands bi-dot"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <p class="card-text mb-3">
                                                <font>
                                                    {{ __('accomodation.start_from') }}
                                                </font>
                                                <strong class="fs-4 text-danger">
                                                    <br>
                                                    <?php
                                                    if ($accomodation->id == 6 || $accomodation->id == 41 || $accomodation->id == 16 || $accomodation->id == 4) {
                                                        echo 'Rp. ' . number_format($accomodation->price_start_from, 0, ',', '.');
                                                    } else {
                                                        echo '-';
                                                    }
                                                    ?>
                                                </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $accomodations->links('vendor.pagination.canvas') }}
                </div>
                <div class="col-md-3 d-none d-md-block">
                    <div class="card ps-2 pt-2">
                        <div class="card-title">
                            <strong class="fs-6">
                                {{ __('accomodation.sort') }}
                            </strong>
                            <br>
                            {{ __('accomodation.desc_sort') }}
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input valid" type="radio" name="order_price"
                                    id="harga-tertinggi" {{ $order_price == 'desc' ? 'checked' : '' }}
                                    onchange="submit()" value="desc" data-gtm-form-interact-field-id="1">
                                <label class="form-check-label"
                                    for="harga-tertinggi">{{ __('accomodation.option_1') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input valid" type="radio" name="order_price"
                                    id="harga-terendah" {{ $order_price == 'asc' ? 'checked' : '' }} value="asc"
                                    onchange="submit()" data-gtm-form-interact-field-id="0">
                                <label class="form-check-label"
                                    for="harga-terendah">{{ __('accomodation.option_2') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="card-title">
                            <strong class="fs-6">
                                {{ __('accomodation.sort_2') }}
                            </strong>
                            <a href="{{ url('/akomodasi') }}" class="float-end text-warning fw-bold">
                                {{ __('accomodation.reset') }}
                            </a>
                            <br>
                            {{ __('accomodation.desc_sort_2') }}
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <strong class="fs-5">
                                {{ __('accomodation.stars') }}
                            </strong>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['100']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="100"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span><span
                                                class="star" title="Four Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Five Stars"><span class="bi-star"></span></span></span><span
                                            class="filled-stars" style="width: 100%;"><span class="star"
                                                title="One Star"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Four Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Five Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['80']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="80"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span><span
                                                class="star" title="Four Stars"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Two Stars"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Three Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Four Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['60']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="60"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star"></span></span></span><span
                                            class="filled-stars" style="width: 100%;"><span class="star"
                                                title="One Star"><span class="bi-star-fill"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Three Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['40']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="40"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span class="bi-star"></span></span><span
                                                class="star" title="Two Stars"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span><span class="star"
                                                title="Two Stars"><span class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="rating-container theme-krajee-svg rating-md rating-animate">
                                    <div class="clear-rating clear-rating-active ">
                                        <input class="form-check-input fs-3"
                                            type="checkbox"{{ !empty($star_list['20']) ? 'checked' : '' }}
                                            name="star_list[]" onchange="submit()" id="checkboxNoLabel" value="20"
                                            aria-label="...">
                                    </div>
                                    <div class="rating-stars" tabindex="0"><span class="empty-stars"><span
                                                class="star" title="One Star"><span
                                                    class="bi-star"></span></span></span><span class="filled-stars"
                                            style="width: 100%;"><span class="star" title="One Star"><span
                                                    class="bi-star-fill"></span></span></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    </div>
    <div class="clearfix mb-5"></div>
@endsection
