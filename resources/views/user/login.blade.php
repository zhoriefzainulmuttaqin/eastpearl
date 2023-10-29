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
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">

	<!-- Core Style -->
	<link rel="stylesheet" href="{{ url('canvas') }}/style.css">

	<!-- Font Icons -->
	<link rel="stylesheet" href="{{ url('canvas') }}/css/font-icons.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="{{ url('canvas') }}/css/custom.css">
	<link rel="stylesheet" href="{{ url('css/style-visit.css') }}">

	<!-- Document Title
	============================================= -->
	<link href="{{ url('images/logosaja.png') }}" rel="icon" type="image/png">
	<title>Login | {{ config("app.name") }} - {{ config('app.slogan') }}</title>


</head>

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
                                    <i class="accordion-closed fa-solid fa-lock"></i>
                                    <i class="accordion-open bi-unlock"></i>
                                </div>
                                <div class="accordion-title">
                                    Masuk Akun
                                </div>
                            </div>
                            <div class="accordion-content">
                                <form id="login-form" name="login-form" class="row mb-0" action="{{ url('proses-login') }}" method="post">
                                    @csrf
                                    <div class="col-12 form-group">
                                        <label for="login-form-username">Username</label>
                                        <input type="text" id="login-form-username" name="username" value="" class="form-control">
                                    </div>
        
                                    <div class="col-12 form-group">
                                        <label for="login-form-password">Password</label>
                                        <input type="password" id="login-form-password" name="password" value="" class="form-control">
                                    </div>
        
                                    <div class="col-12 form-group">
                                        <div class="d-flex justify-content-between">
                                            <button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                                            <a href="{{ url('/') }}">Kembali ke home</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-12 mt-3">
                                        <p class="text-center">Belum punya akun? <a href="{{ url('registrasi') }}">Daftar Sekarang !</a></p>
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