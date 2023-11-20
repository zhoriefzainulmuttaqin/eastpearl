@extends('admin.template')

@section('title')
    Galeri Akomodasi {{ $accomodation->name }}
@endsection

@section('content')
    <div class="mb-3 text-right">
        <a href='{{ url("/app-admin/data/tambah/galeri/akomodasi/$accomodation->slug") }}'>
            <button type="button" class="btn  btn-sm btn-primary">Tambah Galeri</button>
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
                                <th>Akomodasi</th>
                                <th>Nama Foto</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accomodationGalleries as $accomodationGallery)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $accomodation->name }}</td>
                                    <td class="text-center">
                                        {{ $accomodationGallery->name }}
                                    </td>
                                    <td class="text-center">
                                        <img src='{{ url("/assets/akomodasi/$accomodationGallery->picture") }}'
                                            class="img-preview mb-3 img-fluid" style="height: 50px; widht: auto;">
                                    </td>
                                    <td class="text-center">
                                        <a
                                            href='{{ url("/app-admin/data/ubah/galeri/akomodasi/$accomodation->slug/$accomodationGallery->id") }}'>
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="{{ url("/app-admin/data/hapus/galeri/akomodasi/$accomodation->slug/$accomodationGallery->id") }}"
                                            onclick='return confirm("Apakah anda yakin hapus {{ $accomodationGallery->name }}?")'>
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