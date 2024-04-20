@extends('admin.template')

@section('title')
    Data Fasilitas Layanan
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href='{{ url('/app-admin/data/tambah/fasilitas') }}'>
            <button type="button" class="btn  btn-sm btn-primary">Tambah Fasilitas</button>
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
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nama (Inggris)</th>
                                <th class="text-center">Nama (Mandarin)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fasilitas as $fas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $fas->name }}</td>
                                    <td>{{ $fas->name_en }}</td>
                                    <td>{{ $fas->name_mandarin }}</td>

                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/fasilitas/ubah/$fas->name") }}'>
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
                </div>
            </div>
        </div>
    </div>
@endsection
