@extends('admin.template')

@section('title')
    Dashboard
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

    <div class="row">
        <div class="col-lg-2 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $count_sharing_trip }}</h3>
                    <p>Sharing & Private Trip</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map-marked"></i>
                </div>
                <a href="{{ url('app-admin/data/layanan/sharing-and-private-trip') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $count_land_trip }}</h3>
                    <p>Land Trip</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map-marked"></i>
                </div>
                <a href="{{ url('app-admin/data/layanan/land-trip') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $count_fly_bajo }}</h3>
                    <p>Fly Bajo</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map-marked"></i>
                </div>
                <a href="{{ url('app-admin/data/layanan/fly-bajo') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>{{ $count_destination }}</h3>
                    <p>Destinasi</p>
                </div>
                <div class="icon">
                    <i class="fa fa-map"></i>
                </div>
                <a href="{{ url('app-admin/data/destination') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $count_facility }}</h3>
                    <p>Fasilitas</p>
                </div>
                <div class="icon" style="color: white; opacity: 0.3;">
                    <i class="fa fa-utensils"></i>
                </div>
                <a href="{{ url('app-admin/data/fasilitas') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>{{ $count_traveltopia }}</h3>
                    <p>Traveltopia</p>
                </div>
                <div class="icon" style="color: white; opacity: 0.3;">
                    <i class="fa fa-newspaper"></i>
                </div>
                <a href="{{ url('app-admin/data/traveltopia') }}" class="small-box-footer">Kelola Data <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Fasilitas
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $fas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $fas->name }}</td>
                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/fasilitas/ubah/$fas->id") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/fasilitas/hapus/$fas->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $fas->name }}?")'>
                                            <button type="button" class="btn btn-sm btn-danger" title="hapus">
                                                <i class="fas fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ url('app-admin/data/fasilitas') }}" class="btn btn-primary btn-block mt-5">
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
                        Destinasi
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destination as $dest)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <img src='{{ url("/assets/destination/$dest->image") }}'
                                            class="img-preview mb-3 img-fluid" style="height: 50px; widht: auto;">
                                    </td>
                                    <td>{{ $dest->name }}</td>
                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/destination/ubah/$dest->id ") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/destination/hapus/$dest->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $dest->name }}?")'>
                                            <button type="button" class="btn btn-sm btn-danger" title="hapus">
                                                <i class="fas fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </tbody>
                    </table>
                    <a href="{{ url('app-admin/data/destination') }}" class="btn btn-primary btn-block mt-5">
                        Lihat Data
                        <i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Layanan
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $layanan)
                                <tr>
                                    <td class="text-center">
                                        <img src='{{ url("/assets/services/$layanan->image") }}'
                                            class="img-preview mb-3 img-fluid" style="height: 50px; widht: auto;">
                                    </td>
                                    <td>{{ $layanan->name }}</td>
                                    <td>{{ $layanan->categories->name }}</td>
                                    <td>{{ $layanan->price }}</td>
                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/layanan/ubah/$layanan->slug") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/layanan/hapus/$layanan->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $layanan->name }}?")'>
                                            <button type="button" class="btn btn-sm btn-danger" title="hapus">
                                                <i class="fas fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> <a href="{{ url('app-admin/data/layanan') }}" class="btn btn-primary btn-block mt-5">
                        Lihat Data
                        <i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
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
