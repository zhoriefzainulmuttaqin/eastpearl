@extends('admin.template')

@section('title')
    Data Kategori Layanan
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href='{{ url('/app-admin/data/tambah/kategori') }}'>
            <button type="button" class="btn  btn-sm btn-primary">Tambah Kategori</button>
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
                            @foreach ($kategori as $ktg)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ktg->name }}</td>
                                    <td>{{ $ktg->name_en }}</td>
                                    <td>{{ $ktg->name_mandarin }}</td>

                                    <td class="text-center">
                                        <a href='{{ url("/app-admin/data/kategori/ubah/$ktg->name") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/kategori/hapus/$ktg->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $ktg->name }}?")'>
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
