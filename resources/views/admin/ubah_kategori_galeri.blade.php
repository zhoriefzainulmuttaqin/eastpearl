@extends('admin.template')

@section('title')
    Kategori Galeri
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Kategori</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/kategori_galeri/proses-ubah') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $kategori_galeri->id }}">
                    <input type="hidden" name="image_old" value="{{ $kategori_galeri->image }}">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama"
                                value="{{ old('name') ?? $kategori_galeri->name }}" required autocomplete="off"></input>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Nama (Inggris) </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama (Inggris)"
                                value="{{ old('name_en') ?? $kategori_galeri->name_en }}" required
                                autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama (Mandarin) </label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama (Mandarin)"
                                value="{{ old('name_mandarin') ?? $kategori_galeri->name_mandarin }}" required
                                autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                value="{{ old('slug') ? old('slug') : $kategori_galeri->slug }}" type="text" required
                                placeholder="Masukan Slug . . . ">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('app-admin/data/kategori_galeri') ?>">
                            <button type="button" class="btn btn-danger float-left">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-success float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script>
        const slug = document.querySelector('#slug');
        const name = document.querySelector('#name');
        name.addEventListener('change', function() {
            fetch('/app-admin/buatSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })
    </script>
@endsection
