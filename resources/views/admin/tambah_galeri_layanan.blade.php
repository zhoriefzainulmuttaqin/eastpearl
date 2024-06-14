@extends('admin.template')

@section('title')
    Tambah Galeri Layanan {{ $services->name }}
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah Galeri Layanan</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/galeri/layanan/proses-tambah') }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="services_id" value="{{ $services->id }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image_name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="image_name"
                                id="image_name" placeholder="Masukan nama untuk gambar" value="{{ old('image_name') }}"
                                required autocomplete="off"></input>
                            @error('image_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Deskripsi Singkat</label>
                            <textarea id="content" name="desc" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('desc') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_en">Deskripsi Singkat (Dalam Bahasa Inggris)</label>
                            <textarea id="content_en" name="desc_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('desc_en') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_mandarin">Deskripsi Singkat (Dalam Bahasa Mandarin)</label>
                            <textarea id="content_mandarin" name="desc_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('desc_mandarin') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <img id="addImage" class="img-preview mb-3 img-fluid" style="max-height: 300px; width: auto;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" onchange="previewImage()" required>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url("/app-admin/data/galeri/layanan/$services->slug") }}">
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
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('#addImage');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        CKEDITOR.replace('content', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
        CKEDITOR.replace('content_en', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
        CKEDITOR.replace('content_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
    </script>
@endsection
