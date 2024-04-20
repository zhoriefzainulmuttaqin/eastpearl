@extends('admin.template')

@section('title')
    Tentang Kami
@endsection

@section('content')
    @php
        $isEmpty = $about->isEmpty(); // menampilkan button ketika data table = empty
    @endphp

    @if ($isEmpty)
        <div class="mb-3 text-right">
            <a href='{{ url('/app-admin/data/tambah/tentang') }}'>
                <button type="button" class="btn  btn-sm btn-primary">Tambah Tentang</button>
            </a>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nama Instansi</th>
                                <th class="text-center">Slogan</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Link Maps</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($about as $tentang)
                                <tr>
                                    <td class="text-center">
                                        <img src='{{ url("/assets/tentang/$tentang->image") }}'
                                            class="img-preview mb-3 img-fluid" style="height: 50px; widht: auto;">
                                    </td>
                                    <td>{{ $tentang->company_name }}</td>
                                    <td>{{ $tentang->slogan }}</td>
                                    <td>{{ $tentang->location }}</td>
                                    <td>{{ $tentang->link_maps }}</td>
                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/tentang/ubah/$tentang->company_name") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/tentang/hapus/$tentang->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $tentang->company_name }}?")'>
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
