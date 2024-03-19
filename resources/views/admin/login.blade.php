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
    <link href="{{ url('assets/logosaja.png') }}" rel="icon" type="image/png">
    <title>Login Admin | {{ config('app.name') }} - {{ config('app.slogan') }}</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">

        <!-- Content
  ============================================= -->
        <section id="content">
            <div class="content-wrap py-0">

                <div class="section dark p-0 m-0 h-100 position-absolute"></div>

                <div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
                    <div class="vertical-middle">
                        <div class="container py-5">

                            <div class="text-center">
                                <a href="{{ url('/') }}"><img src="{{ url('assets/east_pearl_redesign.png') }}"
                                        style="height: 200px;"></a>
                            </div>

                            <div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="login-form" name="login-form" class="mb-0"
                                        action="{{ url('app-admin/proses-login') }}" method="post">
                                        <h3>Login Admin</h3>
                                        @if (session()->has('msg_status'))
                                            {!! session('msg') !!}
                                        @endif
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="login-form-username">Username:</label>
                                                <input type="text" id="login-form-username" name="username"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="login-form-password">Password:</label>
                                                <input type="password" id="login-form-password" name="password"
                                                    value="" class="form-control not-dark">
                                            </div>

                                            <div class="col-12 form-group mb-0">
                                                <div class="d-flex justify-content-between">
                                                    <button class="button button-3d button-black m-0"
                                                        id="login-form-submit" name="login-form-submit"
                                                        value="login">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="text-center text-muted mt-3"><small>Copyrights &copy; All Rights Reserved by
                                    Canvas Inc.</small></div>

                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #content end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="{{ url('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ url('canvas') }}/js/plugins.min.js"></script>
    <script src="{{ url('canvas') }}/js/functions.bundle.js"></script>

</body>

</html>
