<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="description" content="{{ config('app.name') }} - {{ config('app.slogan') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- Core Style -->
    <link rel="stylesheet" href="{{ url('canvas') }}/style.css">

    <!-- Font Icons -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/font-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('canvas') }}/css/custom.css">
    <link rel="stylesheet" href="{{ url('css/style-visit.css') }}">

    <!-- Document Title
 ============================================= -->
    <link href="{{ url('images/eastpearl_logo3.png') }}" rel="icon" type="image/png">
    <title>Login | {{ config('app.name') }} - {{ config('app.slogan') }}</title>


</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-26YC4R3P36"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-26YC4R3P36');
</script>

<body class="stretched">
    <!-- Content
    ============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container">
                <div class="row mb-5 justify-content-center">
                    <div class="col-md-12 text-center">
                        <img src="{{ url('assets/logo-dark.png') }}" width="250px" class="img-fluid">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="accordion accordion-lg mx-auto mb-0" style="max-width: 550px;">

                            <div class="accordion-header">
                                <div class="accordion-icon">
                                    <i class="accordion-closed bi-person"></i>
                                    <i class="accordion-open bi-check-circle-fill"></i>
                                </div>
                                <div class="accordion-title">
                                    Daftar Akun Baru
                                </div>
                            </div>
                            <div class="accordion-content">
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <i class="uil fa-brands bi-dot text-dark"></i> {{ $error }} <br>
                                        @endforeach
                                    </div>
                                @endif
                                <form id="register-form" name="register-form" class="row mb-0"
                                    action="{{ url('proses-registrasi') }}" method="post">
                                    @csrf
                                    <div class="col-12 form-group">
                                        <label for="register-form-name">Nama</label>
                                        <input type="text" id="register-form-name" name="name"
                                            value="{{ old('name') }}" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="register-form-email">Email</label>
                                        <input type="text" id="register-form-email" name="email"
                                            value="{{ old('email') }}" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="register-form-username">Username</label>
                                        <input type="text" id="register-form-username" name="username"
                                            value="{{ old('username') }}" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="register-form-phone">No. Handphone</label>
                                        <input type="text" id="register-form-phone" name="phone"
                                            value="{{ old('phone') }}" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="address"> Alamat </label>
                                        <textarea class="form-control" name="address" id="address" placeholder="Masukan Alamat . . . " required
                                            autocomplete="off" required>{{ old('address') }}</textarea>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="register-form-password">Password</label>
                                        <input type="password" id="register-form-password" name="password"
                                            value="{{ old('password') }}" class="form-control" required>
                                    </div>

                                    <div class="col-12 form-group">
                                        <label for="register-form-repassword">Konfirmasi Password</label>
                                        <input type="password" id="register-form-repassword"
                                            name="password_confirmation" value="{{ old('password_confirmation') }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="d-flex justify-content-between">
                                            <button class="button button-3d button-black m-0"
                                                id="register-form-submit" name="register-form-submit"
                                                value="register">Daftar Sekarang</button>
                                            <a href="{{ url('/') }}">Kembali ke home</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-3">
                                        <p class="text-center">Sudah punya akun? <a href="{{ url('login') }}">Login
                                                !</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 d-none d-md-block">
                        <img src="{{ url('assets/bg-login.png') }}" class='img-fluid' width="100%">
                    </div>
                </div>


            </div>
        </div>
    </section><!-- #content end -->
    <!-- JavaScripts
 ============================================= -->
    <script src="{{ url('canvas') }}/js/plugins.min.js"></script>
    <script src="{{ url('canvas') }}/js/functions.bundle.js"></script>
</body>

</html>
