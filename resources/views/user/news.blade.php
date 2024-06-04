@extends('user.template')

@section('title')
    {{ __('news.title') }}
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
        <div class="mb-1 fs-3">
            <b>{{ __('news.heading') }}</b>
        </div>
        <div class="text-lg mb-4 font-normal text-gray-500 lg:text-1xl dark:text-gray-400">
            {{ __('news.desc') }}
        </div>

        <div class="row my-5">
            <div class="col-md-8 col-lg-8 col-sm-12 mb-3 mb-sm-0">
                <?php
                $i = 0;
                ?>
                @foreach ($news as $new)
                    @if ($i <= $batas)
                        <?php
                        $i++;
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-5 shadow-sm h-shadow all-ts h-translate-y-sm overflow-hidden">
                                    <div class="row g-0">
                                        <div class="col-md-3">
                                            <img src="{{ url("assets/berita/$new->image") }}" alt="{{ $new->name }}"
                                                class="img-fluid w-100 h-100">
                                        </div>
                                        <div class="col-md-9 ps-3 pe-2 mb-3">
                                            <h4 class="card-title fs-3 mt-2">
                                                <small class="rounded fs-5 text-danger me-2">
                                                    @if (App::isLocale('id'))
                                                        {{ $new->category_news->name }}
                                                    @elseif(App::isLocale('en'))
                                                        {{ $new->category_news->name_en }}
                                                    @else
                                                        {{ $new->category_news->name_mandarin }}
                                                    @endif
                                                </small>
                                                <br>
                                                <a href='{{ url("/detail-traveltopia/$new->slug") }}'
                                                    class="link-underline-opacity-0 link-danger text-dark fw-bolder">
                                                    @if (App::isLocale('id'))
                                                        {{ $new->name }}
                                                    @elseif(App::isLocale('en'))
                                                        {{ $new->name_en }}
                                                    @else
                                                        {{ $new->name_mandarin }}
                                                    @endif
                                                </a>
                                                <div
                                                    class="text-lg fw-normal fs-6 font-normal text-gray-500 lg:text-1xl dark:text-gray-400">
                                                    <?php
                                                    $date = date_create($new->published_date);
                                                    $days = config('app.days');
                                                    $months = config('app.months');
                                                    $hari = $days[date_format($date, 'l')];
                                                    $tanggal = date_format($date, 'd');
                                                    $bulan = $months[date_format($date, 'F')];
                                                    $tahun = date_format($date, 'Y');
                                                    if (App::isLocale('id')) {
                                                        echo "$hari, $tanggal $bulan $tahun";
                                                    } else {
                                                        echo date_format($date, 'l, d F Y');
                                                    }
                                                    ?>
                                                </div>
                                            </h4>
                                            @if (App::isLocale('id'))
                                                {!! mb_substr(nl2br($new->content), 0, 50) !!}...
                                            @else
                                                {!! mb_substr(nl2br($new->content_en), 0, 50) !!}...
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="col-lg-4 col-sm-12 col-md-4">
                @foreach ($news->skip($i) as $new)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3 shadow-sm h-shadow all-ts h-translate-y-sm">
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <a href="{{ url("/detail-traveltopia/$new->slug") }}">
                                            <img src="{{ url("assets/berita/$new->image") }}"
                                                style="object-fit: cover; width: 100%; height: 200px; border-radius: 10px 10px 0 0;"
                                                alt="{{ $new->name }}">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <small class="rounded fs-5 text-danger me-2">
                                            @if (App::isLocale('id'))
                                                {{ $new->category_news->name }}
                                            @elseif(App::isLocale('en'))
                                                {{ $new->category_news->name_en }}
                                            @else
                                                {{ $new->category_news->name_mandarin }}
                                            @endif
                                        </small>
                                        <br>
                                        <a href='{{ url("/detail-traveltopia/$new->slug") }}'
                                            class="link-underline-opacity-0 link-danger text-dark fw-bolder">
                                            @if (App::isLocale('id'))
                                                {{ $new->name }}
                                            @elseif(App::isLocale('en'))
                                                {{ $new->name_en }}
                                            @else
                                                {{ $new->name_mandarin }}
                                            @endif
                                        </a>
                                    </h5>
                                    @if (App::isLocale('id'))
                                        {!! mb_substr(nl2br($new->content), 0, 50) !!}...
                                    @else
                                        {!! mb_substr(nl2br($new->content_en), 0, 50) !!}...
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{ $news->links('vendor.pagination.canvas') }}
            </div>
        </div>
    </div>
    <div class="clearfix mb-5"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
