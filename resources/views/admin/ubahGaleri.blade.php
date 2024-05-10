@extends('admin.template')

@section('title')
    Ubah Galeri
@endsection

@section('content')
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card" style="padding-bottom: 15px;">
                <div class="card-header">
                    <h3 class="card-title">Ubah Galeri</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/galeri/proses-ubah') }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $galeri->id }}">
                    <input type="hidden" name="image_old" value="{{ $galeri->image }}">

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="image_name"> Nama gambar </label>
                            <input type="text" class="form-control" name="image_name" id="image_name"
                                placeholder="Beri nama gambar" value="{{ old('image_name') ?? $galeri->image_name }}"
                                required></input>
                            @error('image_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="form-label">Gambar </label>
                            <br>
                            <img id="addImage" src="{{ url('assets/galeri/' . $galeri->image) }}"
                                class="mb-3 img-thumbnail" style="max-height: 300px; width: auto;">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>



                        {{-- <div class="form-group">
                            <label for="active_status">Aktif</label>
                            <select class="form-control" id="active_status" required name="active_status">
                                <option value="1"
                                    {{ (old('active_status') ?? $galeri->active_status) == '1' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="0"
                                    {{ (old('active_status') ?? $galeri->active_status) == '0' ? 'selected' : '' }}>
                                    Nonaktif</option>
                            </select>
                        </div> --}}

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
    </script>
@endsection
