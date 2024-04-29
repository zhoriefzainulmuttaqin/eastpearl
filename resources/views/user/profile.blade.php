@extends('user.template_no_cover')

@section('title')
    Profil
@endsection



@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <?php if (session('msg_status')) : ?>
                <div class="alert mt-5 alert-<?= session('msg_status') ?> alert-dismissible fade show" role="alert">
                    <?= session('msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 col-md-12 col-12">
                <div class="single-banner">
                    <div class="row mt-5">
                        <div class="col-md-4 col-lg-4 col-sm-12 mt-3">
                            <div class="card"
                                style="border-radius: 20px 20px 10px 10px; box-shadow: 0 5px 10px rgba(0,0,0,.2);">
                                <?php if (Auth()->user()->picture == null) : ?>
                                <img id="GProfile" class="card-img-top w-100" style="border-radius: 20px 20px 10px 10px;"
                                    src="<?= url('assets/profil/user_default.png') ?>" alt="Card image cap">
                                <?php else : ?>
                                <img id="GProfile" class="card-img-top w-100"
                                    style="border-radius: 20px 20px 10px 10px; width: 360px; height: 360px;"
                                    src="<?= url('assets/profil/' . Auth()->user()->picture) ?>" alt="Card image cap">
                                <?php endif; ?>
                                <div class="card-body">
                                    <p class="card-text text-dark">Besar file: maksimum 10.000.000 bytes (10 Megabytes / 10
                                        MB). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
                                    <form method="post" action="<?= url('proses-ubah-foto-profil') ?>"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <style>
                                            #tombol {
                                                display: none;
                                            }
                                        </style>
                                        <!-- <a id="pilih" class="w-100 btn btn-primary">Pilih Foto -->
                                        <input type="file" class="w-100 btn btn-dark mt-3 rounded" id="customFile"
                                            name="image" onchange="gambarProfile(this);" accept=".png,.jpeg,.jpg,.gif"
                                            required>

                                        <button id="tombol">Simpan</button>

                                        <!-- </a> -->
                                        <script>
                                            function gambarProfile(input) {
                                                if (input.files && input.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        $('#GProfile')
                                                            .attr('src', e.target.result)
                                                            .attr('class', 'card-img-top w-100')
                                                            .height(360);

                                                        $('#tombol')
                                                            .attr('class', 'w-100 btn btn-dark text-white d-block mt-2')
                                                            .attr('type', 'submit');
                                                    };

                                                    reader.readAsDataURL(input.files[0]);
                                                }
                                            }
                                        </script>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12 col-md-8 mt-3">
                            <div class="card" style="box-shadow: 0 5px 10px rgba(0,0,0,.2); border-radius: 10px;">
                                <div class="card-body">
                                    <h5 class="card-title">Biodata Diri <small class="float-end"><a
                                                href="<?= url('ubah-biodata-profil') ?>">Ubah Data </a></small></h5>
                                    <table cellpadding="5">
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><?= Auth()->user()->name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?= Auth()->user()->email ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= Auth()->user()->username ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Handphone</td>
                                            <td>:</td>
                                            <td><?= Auth()->user()->phone ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= Auth()->user()->address ? nl2br(Auth()->user()->address) : '-' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tourism Card</td>
                                            <td>:</td>
                                            <td>
                                                @if (Auth()->user()->disc_card->isNotEmpty())
                                                    <a href="{{ url('discount-card/' . Auth()->user()->disc_card->first()->id . '/download') }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class='fa fa-download'></i>
                                                        Download Kartu
                                                    </a>
                                                @else
                                                    <span class="text-danger">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div>
                                        {{-- <a href="<?= url('ubah-biodata-profil') ?>" class="btn btn-dark card-link">Ubah Biodata</a> --}}
                                        <a href="<?= url('ubah-password-profil') ?>"
                                            class="btn btn-warning text-white card-link">Reset Password</a>
                                        <a href="<?= url('keluar') ?>" class="card-link btn btn-danger float-end">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
