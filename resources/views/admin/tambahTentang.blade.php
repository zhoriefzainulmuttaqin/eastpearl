@extends('admin.template')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Tentang Kami</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/tentang/proses-tambah') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="office_name"> Nama Instansi </label>
                            <input type="text" class="form-control @error('office_name') is-invalid @enderror"
                                name="office_name" id="name" placeholder="Masukan Nama Instansi "
                                value="{{ old('office_name') }}" required autocomplete="off"></input>
                            @error('office_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Deskripsi</label>
                            <textarea id="content" name="description" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('content') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_en">Deskripsi (Dalam Bahasa Inggris)</label>
                            <textarea id="content_en" name="description_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('content_en') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="office_address"> Alamat Instansi </label>
                            <input type="text" class="form-control @error('office_address') is-invalid @enderror"
                                name="office_address" id="name" placeholder="Masukan Alamat "
                                value="{{ old('office_address') }}" required autocomplete="off"></input>
                            @error('office_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="office_maps"> Link Maps Instansi </label>
                            <input type="text" class="form-control @error('office_maps') is-invalid @enderror"
                                name="office_maps" id="name" placeholder="Masukan Link "
                                value="{{ old('office_maps') }}" required autocomplete="off"></input>
                            @error('office_maps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
                        <a href="<?= url('app-admin/data/tentang') ?>">
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
        const slug = document.querySelector('#slug');
        const name = document.querySelector('#name');
        name.addEventListener('change', function() {
            fetch('/app-admin/buatSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

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
            removePlugins: 'image'
        });
        CKEDITOR.replace('content_en', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
    </script>
@endsection
