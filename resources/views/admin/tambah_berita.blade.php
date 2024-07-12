@extends('admin.template')

@section('title')
    TravelTopia
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Tambah TravelTopia</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/traveltopia/proses-tambah') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Judul </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Judul" value="{{ old('name') }}" required
                                autocomplete="off"></input>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Judul (Inggris) </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Judul (Inggris)" value="{{ old('name_en') }}" required
                                autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Judul (Mandarin) </label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Judul (Mandarin)"
                                value="{{ old('name_mandarin') }}" required autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                value="{{ old('slug') }}"type="text" required placeholder="Masukkan Slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategori</label>
                            <select class="form-control" id="category_id" required name="category_id">
                                <option value="">--- Pilih Kategori ---</option>
                                @foreach ($category_news as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea id="content" name="content" placeholder="Masukkan Konten" rows="10" required>{{ old('content') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_en">Konten (Inggris)</label>
                            <textarea id="content_en" name="content_en" placeholder="Masukkan Konten" rows="10"required>{{ old('content_en') }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_mandarin">Konten (Mandarin)</label>
                            <textarea id="content_mandarin" name="content_mandarin" placeholder="Masukkan Konten" rows="10"required>{{ old('content_mandarin') }}</textarea>
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
                        <a href="<?= url('app-admin/data/traveltopia') ?>">
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
            allowedContent: true // Pastikan semua konten diperbolehkan
        });
        CKEDITOR.replace('content_en', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
        });
        CKEDITOR.replace('content_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan
        });
    </script>
@endsection
