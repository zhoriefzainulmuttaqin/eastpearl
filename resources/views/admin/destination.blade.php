@extends('admin.template')

@section('title')
    Data Destinasi Layanan
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href='{{ url('/app-admin/data/tambah/destination') }}'>
            <button type="button" class="btn  btn-sm btn-primary">Tambah Destinasi</button>
        </a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
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
                </div>
            </div>
        </div>
    </div>
@endsection
