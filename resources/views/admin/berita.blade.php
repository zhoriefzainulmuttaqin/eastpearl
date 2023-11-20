@extends('admin.template')

@section('title')
    Berita
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href="{{ url('/app-admin/data/berita/kategori') }}">
            <button type="button" class="btn  btn-sm btn-warning"> Kelola Kategori</button>
        </a>
        <a href="{{ url('/app-admin/data/tambah/berita') }}">
            <button type="button" class="btn  btn-sm btn-primary"> Tambah Berita</button>
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Publikasi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $new)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $new->name }}</td>
                                    <td>{{ $new->category_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($new->published_date)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/app-admin/data/ubah/berita/' . $new->slug) }}">
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url('app-admin/data/hapus/berita/' . $new->slug) }}"
                                            onclick='return confirm("Apakah yakin hapus {{ $new->name }}?")'>
                                            <button type="button" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
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