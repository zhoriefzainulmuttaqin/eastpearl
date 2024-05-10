@extends('admin.template')

@section('title')
    Ubah Galeri Layanan {{ $services->name }} pada {{ $servicesGalleries->image_name }}
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Galeri</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/galeri/layanan/proses-ubah') }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $servicesGalleries->id }}">
                    <input type="hidden" name="image_old" value="{{ $servicesGalleries->image }}">

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image_name"> Nama gambar </label>
                            <input type="text" class="form-control" name="image_name" id="image_name"
                                placeholder="Beri nama gambar"
                                value="{{ old('image_name') ?? $servicesGalleries->image_name }}" required></input>
                            @error('image_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Deskripsi Singkat</label>
                            <textarea id="content" name="desc" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('desc') ?? $servicesGalleries->desc }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_en">Deskripsi Singkat (Dalam Bahasa Inggris)</label>
                            <textarea id="content_en" name="desc_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('desc_en') ?? $servicesGalleries->desc_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_mandarin">Deskripsi Singkat (Dalam Bahasa Mandarin)</label>
                            <textarea id="content_mandarin" name="desc_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('desc_mandarin') ?? $servicesGalleries->desc_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar </label>
                            <br>
                            <img id="addImage" src="{{ url('assets/galeri_layanan/' . $servicesGalleries->image) }}"
                                class="mb-3 img-thumbnail" style="max-height: 300px; width: auto;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                    </div>
                    <div class="card-footer">
                        <a href="{{ url('/app-admin/data/galeri') }}">
                            <button type="button" class="btn btn-danger float-left">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-primary float-right">Ubah</button>
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
            removePlugins: 'image'
        });
        CKEDITOR.replace('content_en', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('content_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
    </script>
@endsection
