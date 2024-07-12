@extends('admin.template')

@section('title')
    Tambah Destinasi
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah Destinasi</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/destination/proses-tambah') }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama Destinasi </label>
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
                            <label for="name_en"> Nama Destinasi (Inggris)</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama  " value="{{ old('name_en') }}" required
                                autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama Destinasi (Mandarin)</label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama  "
                                value="{{ old('name_mandarin') }}" required autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea id="description" name="description" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('description') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Deskripsi (Dalam Bahasa Inggris)</label>
                            <textarea id="description_en" name="description_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_en') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_mandarin">Deskripsi (Dalam Bahasa Mandarin)</label>
                            <textarea id="description_mandarin" name="description_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_mandarin') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar </label>
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
                        <a href="{{ url('/app-admin/data/destination') }}">
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
    <script src="{{ url('/ckeditor/ckeditor.js') }}"></script>

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

        CKEDITOR.replace('description', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan

        });
        CKEDITOR.replace('description_en', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan

        });
        CKEDITOR.replace('description_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan

        });
    </script>
@endsection
