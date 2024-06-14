@extends('admin.template')

@section('title')
    Ubah Destinasi
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Destinasi</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/destination/proses-ubah') }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $destination->id }}">
                    <input type="hidden" name="image_old" value="{{ $destination->image }}">

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama " value="{{ old('name') ?? $destination->name }}"
                                required autocomplete="off"></input>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Nama (Inggris) </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama "
                                value="{{ old('name_en') ?? $destination->name_en }}" required autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama (Mandarin) </label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama "
                                value="{{ old('name_mandarin') ?? $destination->name_mandarin }}" required
                                autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi (Dalam Bahasa Mandarin)</label>
                            <textarea id="description" name="description" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description') ?? $destination->description }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Deskripsi (Dalam Bahasa Mandarin)</label>
                            <textarea id="description_en" name="description_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_en') ?? $destination->description_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_mandarin">Deskripsi (Dalam Bahasa Mandarin)</label>
                            <textarea id="description_mandarin" name="description_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_mandarin') ?? $destination->description_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Gambar </label>
                            <br>
                            <img id="addImage" src="{{ url('assets/destination/' . $destination->image) }}"
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
                        <a href="{{ url('/app-admin/data/destination') }}">
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
        CKEDITOR.replace('description', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
        CKEDITOR.replace('description_en', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
        CKEDITOR.replace('description_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
            removePlugins: 'image'
        });
    </script>
@endsection
