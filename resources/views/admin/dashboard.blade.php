@extends('admin.template')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    {{-- <h3>{{ $count_wisata }}</h3> --}}
                    <p>Tempat Wisata</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map-marked"></i>
                </div>
                <a href="{{ url('app-admin/data/wisata') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    {{-- <h3>{{ $count_kuliner }}</h3> --}}
                    <p>Kuliner</p>
                </div>
                <div class="icon">
                    <i class="fa fa-utensils"></i>
                </div>
                <a href="{{ url('app-admin/data/kuliner') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    {{-- <h3>{{ $count_oleholeh }}</h3> --}}
                    <p>Oleh - Oleh</p>
                </div>
                <div class="icon">
                    <i class="fa fa-gift"></i>
                </div>
                <a href="{{ url('app-admin/data/oleholeh') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    {{-- <h3>{{ $count_akomodasi }}</h3> --}}
                    <p>Akomodasi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-home"></i>
                </div>
                <a href="{{ url('app-admin/data/akomodasi') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Event Mendatang</h4>
                </div>
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php $evno = 0; ?>
                            @foreach ($events as $event)
                                <?php $evno++; ?>
                                <div class="carousel-item {{ $evno == 1 ? 'active' : '' }}">
                                    <img class="d-block w-100" src="{{ url('assets/event/' . $event->cover_picture) }}"
                                        alt="{{ $event->name }}">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Berita Terbaru
                    </h4>
                </div>
                <div class="card-body">
                    @foreach ($news as $news)
                        <p class="mb-2">
                            <b>
                                <a href="{{ url('detail-berita/' . $news->slug) }}" target="_blank">
                                    {{ $news->name }}
                                </a>
                            </b>
                            <br>
                            <span class="text-muted">
                                <i class="uil uil-schedule"></i>
                                {{ tglIndo($news->published_date, 'd/m/Y') }}
                                |
                                <i class="uil uil-user"></i> {{ $news->admin_name }}
                                |
                                <i class="uil uil-folder-open"></i>{{ $news->category_name }}
                            </span>
                        <p>
                            {!! mb_substr(nl2br($news->content), 0, 250) !!}
                        </p>
                        <a href="{{ url('detail-berita/' . $news->slug) }}" target="_blank">
                            Lanjut baca
                        </a>
                        </p>
                        <hr>
                    @endforeach
                    <a href="{{ url('app-admin/data/berita') }}" class="btn btn-primary btn-block mt-5">
                        Kelola Data Berita
                        <i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Transaksi Tourism Card Terbaru
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Pembeli</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cardSales as $transaction)
                                <?php
                                $saleKode = saleKode('TC', $transaction);
                                ?>
                                <tr>
                                    <td class="text-center">#{{ $saleKode }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td class="text-center">
                                        {{ $transaction->quantity }}
                                    </td>
                                    <td class="text-right">
                                        Rp. {{ number_format($transaction->price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-right">
                                        <?php
                                        $total = $transaction->price * $transaction->quantity;
                                        ?>
                                        Rp. {{ number_format($total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('app-admin/transaksi/tourism-card') }}" class="btn btn-primary btn-block mt-5">
                        Lihat Data
                        <i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Transaksi Paket Oleh - oleh Terbaru
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="datatable2">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nama Pembeli</th>
                                <th class="text-center">Paket</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($giftSales as $transaction)
                                <?php
                                $saleKode = saleKode('P', $transaction);
                                ?>
                                <tr>
                                    <td class="text-center">#{{ $saleKode }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    @foreach ($transaction->items as $item)
                                        <td>{{ $item->snapshot_name }}</td>
                                        <td class="text-center">
                                            {{ $item->quantity }}
                                            {{ $item->snapshot_unit }}
                                        </td>
                                        <td class="text-right">
                                            Rp. {{ number_format($item->snapshot_price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            $total = $item->snapshot_price * $item->quantity;
                                            ?>
                                            Rp. {{ number_format($total, 0, ',', '.') }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('app-admin/transaksi/paket-oleholeh') }}" class="btn btn-primary btn-block mt-5">
                        Lihat Data
                        <i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <script>
        $(function() {
            $('#datatable2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [],
            });
        });
    </script>
@endsection
