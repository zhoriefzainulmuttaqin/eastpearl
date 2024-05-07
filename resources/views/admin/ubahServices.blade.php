@extends('admin.template')

@section('title')
    Layanan
@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Layanan {{ $services->name }}</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/layanan/proses-ubah') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="services_id" value="{{ $services->id }}">
                    <input type="hidden" name="bulan_terbaik" value="{{ $services->bulan_terbaik }}">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama" value="{{ old('name') ?? $services->name }}"
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
                                id="name_en" placeholder="Masukan Nama" value="{{ old('name_en') ?? $services->name_en }}"
                                required autocomplete="off"></input>
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama (Mandarin)</label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama"
                                value="{{ old('name_mandarin') ?? $services->name_mandarin }}" required
                                autocomplete="off"></input>
                            @error('name_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug"> slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                                id="slug" placeholder="Masukan Nama" value="{{ old('slug') ?? $services->slug }}"
                                required autocomplete="off"></input>
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categories_id">Kategori</label>
                            <select class="form-control" id="categories_id" required name="categories_id">
                                <option value="">--- Pilih Kategori ---</option>
                                @foreach ($categories as $category)
                                    <?php
                                    if ($services->categories_id == $category->id) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                    <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="facilities_id">Fasilitas</label>
                            <select class="js-example-basic-multiple form-control" multiple="multiple" id="facilities_id[]"
                                required name="facilities_id[]">
                                <option value="">--- Pilih Fasilitas ---</option>
                                @foreach ($facility as $fas)
                                    <?php
                                    if ($fas->id) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                    <option value="{{ $fas->id }}" {{ $selected }}>{{ $fas->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="destination_id">Destinasi</label>
                            <select class="js-example-basic-multiple form-control" multiple="multiple" id="destination_id[]"
                                required name="destination_id[]">
                                <option value="">--- Pilih Destinasi ---</option>
                                @foreach ($destination as $des)
                                    <?php
                                    if ($des->id) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    ?>
                                    <option value="{{ $des->id }}" {{ $selected }}>{{ $des->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Deskripsi Singkat</label>
                            <textarea id="content" name="short_desc" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('short_desc') ?? $services->short_desc }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_en">Deskripsi Singkat (Dalam Bahasa Inggris)</label>
                            <textarea id="content_en" name="short_desc_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('short_desc_en') ?? $services->short_desc_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="content_mandarin">Deskripsi Singkat (Dalam Bahasa Mandarin)</label>
                            <textarea id="content_mandarin" name="short_desc_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('short_desc_mandarin') ?? $services->short_desc_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_content">Deskripsi panjang</label>
                            <textarea id="long_content" name="long_desc" placeholder="Masukkan Deskripsi" rows="10" required>{{ old('long_desc') ?? $services->long_desc }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_content_en">Deskripsi panjang (Dalam Bahasa Inggris)</label>
                            <textarea id="long_content_en" name="long_desc_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('long_desc_en') ?? $services->long_desc_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_content_mandarin">Deskripsi panjang (Dalam Bahasa Mandarin)</label>
                            <textarea id="long_content_mandarin" name="long_desc_mandarin" placeholder="Masukkan Deskripsi"
                                rows="10"required>{{ old('long_desc_mandarin') ?? $services->long_desc_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="price"> Harga</label>
                            <input type="number" min="0"
                                class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                                placeholder="0" value="{{ old('price') ?? $services->price }}" required
                                autocomplete="off"></input>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="meeting_point">Meeting Point</label>
                            <input type="text" class="form-control @error('meeting_point') is-invalid @enderror"
                                name="meeting_point" id="meeting_point" placeholder="Dimana meeting point berada?"
                                value="{{ old('meeting_point') ?? $services->meeting_point }}" required
                                autocomplete="off"></input>
                            @error('meeting_point')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="aktivitas_fisik">Aktivitas Fisik</label>
                            <input type="text" class="form-control @error('aktivitas_fisik') is-invalid @enderror"
                                name="aktivitas_fisik" id="aktivitas_fisik" placeholder="Aktivitas fisik selama tour"
                                value="{{ old('aktivitas_fisik') ?? $services->aktivitas_fisik }}" required
                                autocomplete="off"></input>
                            @error('aktivitas_fisik ')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="durasi">Durasi</label>
                            <input type="text" class="form-control @error('durasi') is-invalid @enderror"
                                name="durasi" id="durasi" placeholder="Durasi tour"
                                value="{{ old('durasi') ?? $services->durasi }}" required autocomplete="off"></input>
                            @error('durasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="minimal_peserta">Minimal Peserta</label>
                            <input type="number" class="form-control @error('minimal_peserta') is-invalid @enderror"
                                name="minimal_peserta" id="minimal_peserta" placeholder="1"
                                value="{{ old('minimal_peserta') ?? $services->minimal_peserta }}" required
                                autocomplete="off"></input>
                            @error('minimal_peserta')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <br>
                            <img id="addImage" src='{{ url("/assets/services/$services->image") }}'
                                class="img-preview mb-3 img-fluid" style="max-height: 300px; width: auto;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                name="image" id="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= url('app-admin/data/layanan') ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        CKEDITOR.replace('content_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('long_content', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('long_content_en', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });
        CKEDITOR.replace('long_content_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            removePlugins: 'image'
        });

        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
