@extends('admin.template')

@section('title')
    Tambah Fasilitas Layanan
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah Fasilitas Layanan</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/fasilitas/proses-tambah') }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama Fasilitas </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama  " value="{{ old('name') }}" required
                                autocomplete="off"></input>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Nama Fasilitas (Inggris)</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama " value="{{ old('name_en') }}" required
                                autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama Fasilitas (Mandarin)</label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama  "
                                value="{{ old('name_mandarin') }}" required autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/app-admin/data/fasilitas') }}">
                            <button type="button" class="btn btn-danger float-left">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
