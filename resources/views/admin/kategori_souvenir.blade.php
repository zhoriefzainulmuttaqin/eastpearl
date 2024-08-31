@extends('admin.template')

@section('title')
    Kategori Souvenir
@endsection

@section('content')
    <!-- Modal Edit -->
    <form method="post" action="<?= url('app-admin/data/souvenir/kategori/proses-ubah') ?>">
        @csrf
        <div class="modal fade" id="modalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-green">
                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Kategori</h5>
                        <button style="color: white;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editCategoryId">
                        <div class='form-group'>
                            <label class='form-label'>Nama</label>
                            <input type='text' id="editCategoryName" name='name' class='form-control'
                                placeholder="Masukan Nama" required>
                        </div>
                        <div class='form-group'>
                            <label class='form-label'>Nama (Inggris)</label>
                            <input type='text' id="editCategoryNameEn" name='name_en' class='form-control'
                                placeholder="Masukan Nama (Ingris)" required>
                        </div>
                        <div class='form-group'>
                            <label class='form-label'>Nama (Mandarin)</label>
                            <input type='text' id="editCategoryNameMandarin" name='name_mandarin' class='form-control'
                                placeholder="Masukan Nama (Mandarin)" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input name="slug" class="form-control @error('slug') is-invalid @enderror" id="slugEdit"
                                type="text" required placeholder="Masukkan Slug">
                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Of Modal Edit -->

    {{-- Modal Tambah --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kategori</h3>
                </div>
                <form method="POST" action="{{ url('app-admin/data/souvenir/kategori/proses-tambah') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name"> Nama </label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Masukan Nama " value="{{ old('name') }}" required
                                autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en"> Nama (Inggris) </label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" name="name_en"
                                id="name_en" placeholder="Masukan Nama (Inggris) " value="{{ old('name_en') }}" required
                                autocomplete="off">
                            @error('name_en')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_mandarin"> Nama (Mandarin) </label>
                            <input type="text" class="form-control @error('name_mandarin') is-invalid @enderror"
                                name="name_mandarin" id="name_mandarin" placeholder="Masukan Nama (Inggris) "
                                value="{{ old('name_mandarin') }}" required autocomplete="off">
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama (Indonesia)</th>
                                <th>Nama (Inggris)</th>
                                <th>Nama (Mandarin)</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_souvenir as $category)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->name_en }}</td>
                                    <td>{{ $category->name_mandarin }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)"
                                            onclick="edit('<?= $category->id ?>','<?= $category->name ?>','<?= $category->name_en ?>','<?= $category->name_mandarin ?>')"
                                            data-toggle="modal" data-target="#modalEdit">
                                            <button type="button" class="btn btn-sm btn-success" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url('app-admin/data/souvenir/kategori/proses-hapus/' . $category->id) }}"
                                            onclick='return confirm("Apakah yakin hapus {{ $category->name }}?")'>
                                            <button type="button" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Modal Tambah --}}
    <script src="{{ url('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        const slug = document.querySelector('#slug');
        const name = document.querySelector('#name');
        name.addEventListener('change', function() {
            fetch('/app-admin/buatSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        })

        function edit(id, name, name_en, name_mandarin, slug) {
            $("#editCategoryId").val(id)
            $("#editCategoryName").val(name)
            $("#editCategoryNameEn").val(name_en)
            $("#editCategoryNameMandarin").val(name)
            $("#slugEdit").val(slug)
        }
    </script>
@endsection
