@extends('admin.template')

@section('title')
    Data Layanan {{ $category->name }}
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href='{{ url('/app-admin/data/layanan') }}'>
            <button type="button" class="btn  btn-sm btn-primary">Lihat Semua Layanan</button>
        </a>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                                        <a href="{{ url("/app-admin/data/galeri/layanan/$layanan->slug") }}">
                                            <button type="button" class="btn btn-sm btn-warning" title="galeri"><i
                                                    class="fas fa-image"></i></button>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
