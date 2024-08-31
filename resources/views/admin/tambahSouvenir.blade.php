@extends('admin.template')

@section('title')
    Tambah Souvenir
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Souvenir</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/souvenir/proses-tambah') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama Souvenir " value="{{ old('name') }}" required
                                autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Nama (Bahasa Inggris) </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama Souvenir (Bahasa Inggris) "
                                value="{{ old('name_en') }}" required autocomplete="off">
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama (Bahasa Mandarin) </label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin"
                                placeholder="Masukan Nama Souvenir (Bahasa Mandarin) " value="{{ old('name_mandarin') }}"
                                required autocomplete="off">
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                value="{{ old('slug') }}" type="text" required placeholder="Masukan Slug ">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="souvenir_category_id">Kategori</label>
                            <select class="form-control" id="souvenir_category_id" required name="souvenir_category_id">
                                <option value="">--- Pilih Kategori ---</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price"> Harga </label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                id="price" placeholder="Masukan Harga " value="{{ old('price') }}" autocomplete="off">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="disc_price"> Harga Diskon</label>
                            <input type="number" class="form-control @error('disc_price') is-invalid @enderror"
                                name="disc_price" id="disc_price" placeholder="Masukan Harga "
                                value="{{ old('disc_price') }}" autocomplete="off">
                            @error('disc_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc"> Deskripsi </label>
                            <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc"
                                placeholder="Masukan Deskripsi " required autocomplete="off" required>{{ old('desc') }}</textarea>
                            @error('desc')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc_en"> Deskripsi (Bahasa Inggris) </label>
                            <textarea class="form-control @error('desc_en') is-invalid @enderror" name="desc_en" id="desc_en"
                                placeholder="Masukan Deskripsi (Bahasa Inggris) " required autocomplete="off" required>{{ old('desc_en') }}</textarea>
                            @error('desc_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc_mandarin"> Deskripsi (Bahasa Mandarin) </label>
                            <textarea class="form-control @error('desc_mandarin') is-invalid @enderror" name="desc_mandarin" id="desc_mandarin"
                                placeholder="Masukan Deskripsi (Bahasa Mandarin) " required autocomplete="off" required>{{ old('desc_mandarin') }}</textarea>
                            @error('desc_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <img id="addImage" class="mb-3 img-thumbnail" style="max-height: 300px; width: auto;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                name="image" id="image" onchange="previewImage()" required>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_shopee">Link Shopee</label>
                            <input name="link_shopee" class="form-control @error('link_shopee') is-invalid @enderror"
                                id="link_shopee" value="{{ old('link_shopee') }}" type="url" required
                                placeholder="Https://... ">
                            @error('link_shopee')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_amazon">Link Amazzon (*opsional)</label>
                            <input name="link_amazon" class="form-control @error('link_amazon') is-invalid @enderror"
                                id="link_amazon" value="{{ old('link_amazon') }}" type="url"
                                placeholder="https://...">
                            @error('link_amazon')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_alibaba">Link Alibaba (*opsional)</label>
                            <input name="link_alibaba" class="form-control @error('link_alibaba') is-invalid @enderror"
                                id="link_alibaba" value="{{ old('link_alibaba') }}" type="url"
                                placeholder="https://...">
                            @error('link_alibaba')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_tokopedia">Link Tokopedia (*opsional)</label>
                            <input name="link_tokopedia"
                                class="form-control @error('link_tokopedia') is-invalid @enderror" id="link_tokopedia"
                                value="{{ old('link_tokopedia') }}" type="url" placeholder="https://...">
                            @error('link_tokopedia')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_blibli">Link Blibli (*opsional)</label>
                            <input name="link_blibli" class="form-control @error('link_blibli') is-invalid @enderror"
                                id="link_blibli" value="{{ old('link_blibli') }}" type="url"
                                placeholder="https://...">
                            @error('link_blibli')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="<?= url('app-admin/data/souvenir') ?>">
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

        CKEDITOR.replace('desc', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('desc_en', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('desc_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        // CKEDITOR.replace('facilities', {
        //     removePlugins: 'image'
        // });
        // CKEDITOR.replace('facilities_en', {
        //     removePlugins: 'image'
        // });
    </script>
@endsection
