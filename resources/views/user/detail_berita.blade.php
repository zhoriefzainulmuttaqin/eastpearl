@extends('user.template_no_cover')

@section('title')
    {{ __('news_detail.title') }}
@endsection

@section('cover')
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

    <div class="container">
        <div class="row gx-5 col-mb-80">
            <div class="card border-0">
                <div class="card-body">
                    <form action="" method="get" class="row  align-items-center">
                        <div class="col-md-12">
                            <div class="mb-1">
                                <label for="cari" class="form-label fw-bold fs-4">{{ __('news_detail.search') }}</label>
                                <div class="input-group mb-3">
                                    <input type="search" class="form-control" id="cari"
                                        value="{{ isset($_GET['keyword']) ? $_GET['keyword'] : '' }}" name="keyword"
                                        placeholder="{{ __('news_detail.placeholder_search') }}">
                                    <button class="btn btn-secondary" type="submit"
                                        id="button-addon2">{{ __('news_detail.search') }}</button>
                                </div>
                            </div>
                        </div>
                        @if (isset($_GET['keyword']))
                            <a href="{{ url('berita') }}"
                                class="text-primary"><span>{{ __('news_detail.show_all_data') }}</span></a>
                        @endif
                    </form>
                </div>
            </div>
            <main class="postcontent col-lg-12">
                @if (!isset($_GET['keyword']))
                    <div class="single-post mb-0">
                        <div class="entry">
                            <div class="entry-title">
                                @if (App::isLocale('id'))
                                    <h2>{{ $new->name }}</h2>
                                @else
                                    <h2>{{ $new->name_en }}</h2>
                                @endif
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <i class="uil uil-schedule"></i>
                                        @if (App::isLocale('id'))
                                            {{ tglIndo($new->published_date, 'd/m/Y') }}
                                        @else
                                            <?php $date = date_create($new->published_date); ?>
                                            {{ date_format($date, 'l, d F Y') }}
                                        @endif
                                    </li>
                                    <li><i class="uil uil-user"></i>{{ $new->admin_name }}</li>
                                    <li>
                                        <i class="uil uil-folder-open"></i>
                                        @if (App::isLocale('id'))
                                            {{ $new->category_name }}
                                        @else
                                            {{ $new->category_name_en }}
                                        @endif
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-image">
                                <a href="#"><img src="{{ url("assets/berita/$new->cover_picture") }}"
                                        alt="Blog Single"></a>
                            </div>
                            <div class="entry-content mt-0">
                                @if (App::isLocale('id'))
                                    {!! nl2br($new->content) !!}
                                @else
                                    {!! nl2br($new->content_en) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <h4 class="fs-4 fw-medium">{{ __('news_detail.recomendation') }}</h4>
                <div class="row my-5">
                    <div class="col-md-8 col-lg-8 col-sm-12 mb-3 mb-sm-0">
                        <?php
                        $i = 0;
                        ?>
                        @foreach ($news as $new1)
                            @if ($new1->slug != $new->slug || isset($_GET['keyword']))
                                @if ($i <= $batas)
                                    <?php
                                    $i++;
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card shadow h-shadow-sm mb-5 overflow-hidden">
                                                <div class="row g-0">
                                                    <div class="col-md-3">
                                                        <img src="{{ url("assets/berita/$new1->cover_picture") }}"
                                                            class="img-fluid w-100 h-100">
                                                    </div>
                                                    <div class="col-md-9 ps-3 pe-2 mb-3">
                                                        <h4 class="card-title fs-3 mt-2">
                                                            <small class="rounded fs-5 text-warning me-2">
                                                                @if (App::isLocale('id'))
                                                                    {{ $new1->category_name }}
                                                                @else
                                                                    {{ $new1->category_name_en }}
                                                                @endif
                                                            </small>
                                                            <br>
                                                            <a href='{{ url("/detail-berita/$new1->slug") }}'
                                                                class="link-underline-opacity-0 link-info text-dark">
                                                                @if (App::isLocale('id'))
                                                                    {{ $new1->name }}
                                                                @else
                                                                    {{ $new1->name_en }}
                                                                @endif
                                                            </a>
                                                            <div class="text-lg fw-normal fs-5">
                                                                <?php
                                                                $date = date_create($new1->published_date);
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
                                                            {!! mb_substr(nl2br($new1->content), 0, 50) !!}...
                                                        @else
                                                            {!! mb_substr(nl2br($new1->content_en), 0, 50) !!}...
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>

                    <div class="col-lg-4 col-sm-12 col-md-4">
                        @foreach ($news->skip($i) as $new1)
                            @if ($new1->slug != $new->slug || isset($_GET['keyword']))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card mb-3 shadow h-shadow-sm">
                                            <div class="row g-0">
                                                <div class="col-md-12">
                                                    <img src="{{ url("assets/berita/$new1->cover_picture") }}"
                                                        style="object-fit: cover;
                                            width: 100%;
                                            height: 200px;"
                                                        alt="...">
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <small class="rounded fs-5 text-warning me-2">
                                                        @if (App::isLocale('id'))
                                                            {{ $new1->category_name }}
                                                        @else
                                                            {{ $new1->category_name_en }}
                                                        @endif
                                                    </small>
                                                    <br>
                                                    <a href='{{ url("detail-berita/$new1->slug") }}'
                                                        class="link-underline-opacity-0 link-info text-dark">
                                                        @if (App::isLocale('id'))
                                                            {{ $new1->name }}
                                                        @else
                                                            {{ $new1->name_en }}
                                                        @endif
                                                    </a>
                                                </h5>
                                                @if (App::isLocale('id'))
                                                    {!! mb_substr(nl2br($new1->content), 0, 50) !!}...
                                                @else
                                                    {!! mb_substr(nl2br($new1->content_en), 0, 50) !!}...
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="clearfix mb-5"></div>
@endsection
