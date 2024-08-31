@extends('admin.template')

@section('title')
    Souvenir
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href="{{ url('/app-admin/data/souvenir/kategori') }}">
            <button type="button" class="btn  btn-sm btn-warning"> Kelola Kategori</button>
        </a>
        <a href="{{ url('/app-admin/data/tambah/souvenir') }}">
            <button type="button" class="btn  btn-sm btn-primary"> Tambah Souvenir</button>
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
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Harga Diskon</th>
                                <th>Link</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($souvenir as $svr)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $svr->category->name }}</td>
                                    <td>
                                        <img src='{{ url("/assets/souvenir/$svr->image") }}' class="justify-content-center"
                                            style="height: 50px; widht: auto;">
                                    </td>
                                    <td>{{ $svr->name }}</td>
                                    <td>{{ $svr->price }}</td>
                                    <td>{{ $svr->disc_price }}</td>
                                    <td>{{ $svr->disc_price }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/app-admin/data/souvenir/ubah/' . $svr->slug) }}">
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url('app-admin/data/souvenir/proses-hapus/' . $svr->slug) }}"
                                            onclick='return confirm("Apakah yakin hapus {{ $svr->name }}?")'>
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
