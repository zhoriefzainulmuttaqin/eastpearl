@extends('admin.template')

@section('title')
    Tentang Kami
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Tentang Kami</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/tentang/proses-ubah') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tentang->id }}">
                    <input type="hidden" name="image_old" value="{{ $tentang->image }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="company_name"> Nama Instansi </label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                name="company_name" id="company_name" placeholder="Masukan Nama "
                                value="{{ old('company_name') ?? $tentang->company_name }}" required
                                autocomplete="off"></input>
                            @error('company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi (Dalam Bahasa Indonesia)</label>
                            <textarea id="description" name="description" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description') ?? $tentang->description }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_en">Deskripsi (Dalam Bahasa Inggris)</label>
                            <textarea id="description_en" name="description_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_en') ?? $tentang->description_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="description_mandarin">Deskripsi (Dalam Bahasa Mandarin)</label>
                            <textarea id="description_mandarin" name="description_mandarin" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('description_mandarin') ?? $tentang->description_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_description">Deskripsi Panjang (Dalam Bahasa Indonesia)</label>
                            <textarea id="long_description" name="long_description" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('long_description') ?? $tentang->long_description }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_description_en">Deskripsi Panjang (Dalam Bahasa Inggris)</label>
                            <textarea id="long_description_en" name="long_description_en" placeholder="Masukkan Deskripsi" rows="10"required>{{ old('long_description_en') ?? $tentang->long_description_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_description_mandarin">Deskripsi Panjang (Dalam Bahasa Mandarin)</label>
                            <textarea id="long_description_mandarin" name="long_description_mandarin" placeholder="Masukkan Deskripsi"
                                rows="10"required>{{ old('long_description_mandarin') ?? $tentang->long_description_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="slogan"> Slogan </label>
                            <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan"
                                id="slogan" placeholder="Masukan Slogan "
                                value="{{ old('slogan') ?? $tentang->slogan }}" required autocomplete="off"></input>
                            @error('slogan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="location"> Lokasi </label>
                            <input type="text" class="form-control @error('location') is-invalid @enderror"
                                name="location" id="location" placeholder="Masukan location "
                                value="{{ old('location') ?? $tentang->location }}" required autocomplete="off"></input>
                            @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_maps"> Embeded Maps </label>
                            <input type="text" class="form-control @error('link_maps') is-invalid @enderror"
                                name="link_maps" id="link_maps" placeholder="Masukan Embed Maps "
                                value="{{ old('link_maps') ?? $tentang->link_maps }}" required autocomplete="off"></input>
                            @error('link_maps')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <br>
                            <img id="addImage" src='{{ url("/assets/tentang/$tentang->image") }}'
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
                        <a href="<?= url('app-admin/data/tentang') ?>">
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
        CKEDITOR.replace('long_description', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan



        });
        CKEDITOR.replace('long_description_en', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan

        });
        CKEDITOR.replace('long_description_mandarin', {
            enterMode: CKEDITOR.ENTER_BR,
            allowedContent: true // Pastikan semua konten diperbolehkan

        });
    </script>
@endsection
