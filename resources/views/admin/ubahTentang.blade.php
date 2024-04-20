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
                            <label for="description"> Deskripsi </label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" id="description" placeholder="Masukan Deskripsi "
                                value="{{ old('description') ?? $tentang->description }}" required
                                autocomplete="off"></input>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_en"> Deskripsi (Inggris) </label>
                            <input type="text" class="form-control @error('description_en') is-invalid @enderror"
                                name="description_en" id="description_en" placeholder="Masukan Deskripsi (Inggris) "
                                value="{{ old('description_en') ?? $tentang->description_en }}" required
                                autocomplete="off"></input>
                            @error('description_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description_mandarin"> Deskripsi (Mandarin) </label>
                            <input type="text" class="form-control @error('description_mandarin') is-invalid @enderror"
                                name="description_mandarin" id="description_mandarin"
                                placeholder="Masukan Deskripsi (Mandarin) "
                                value="{{ old('description_mandarin') ?? $tentang->description_mandarin }}" required
                                autocomplete="off"></input>
                            @error('description_mandarin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="long_content">Deskripsi Panjang</label>
                            <textarea id="long_content" name="long_description" placeholder="Masukkan Deskripsi Panjang" rows="10" required>{{ old('long_description') ?? $tentang->long_description }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_content_en">Deskripsi Panjang (Inggris)</label>
                            <textarea id="long_content_en" name="long_description_en" placeholder="Masukkan Deskripsi Panjang" rows="10"
                                required>{{ old('long_description_en') ?? $tentang->long_description_en }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="long_content_mandarin">Deskripsi Panjang (Mandarin)</label>
                            <textarea id="long_content_mandarin" name="long_description_mandarin" placeholder="Masukkan Deskripsi Panjang"
                                rows="10" required>{{ old('long_description_mandarin') ?? $tentang->long_description_mandarin }}</textarea>
                            <div class="my-3"></div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">Gambar</label>
                            <br>
                            <img id="addImage" src='{{ url("/assets/tentang/$tentang->image") }}'
                                class="img-preview mb-3 img-fluid" style="max-height: 300px; width: auto;">
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

            const ofReader = tentang FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

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
    </script>
@endsection
