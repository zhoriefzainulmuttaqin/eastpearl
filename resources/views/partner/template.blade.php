
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mitra | {{ config("app.name") }}</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('adminlte') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<link rel="stylesheet" href="{{ url('adminlte') }}/dist/css/adminlte.min.css?v=3.2.0">

@yield("style")

</head>
<body class="hold-transition sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-lightblue navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('app-mitra/keluar') }}" onclick="return confirm('Yakin keluar.?')">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ url('app-mitra') }}" class="brand-link">
                <img src="{{ url('assets/logo-light.png') }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">&nbsp;</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="{{ url('app-mitra/profil') }}" class="d-block">
                            {{ Auth::guard('partner')->user()->name }}
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                </div>
                
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('app-mitra/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('app-mitra/data-profil') }}" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Data Profil
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('app-mitra/penggunaan-kartu') }}" class="nav-link">
                                <i class="nav-icon fa fa-credit-card"></i>
                                <p>
                                    Penggunaan Kartu
                                </p>
                            </a>
                        </li>                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">                                
                                <li class="nav-item">
                                    <a href="{{ url('app-mitra/laporan/akses/discount-card') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Akses Discount Card</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield("title")</h1>
                        </div>
                        <!-- <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    @yield("content")
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                &nbsp;
            </div>
            <strong>Copyright &copy; {{ config("app.year_made") }} <a href="https://visitcirebon.id">{{ config("app.name") }}</a>.</strong> All rights reserved.
        </footer>
    </div>

<script src="{{ url('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{ url('adminlte') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="{{ url('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('adminlte') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="{{ url('adminlte') }}/dist/js/adminlte.min.js?v=3.2.0"></script>

@if (session()->has('msg_status'))
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $(document).ready(function() {
            Toast.fire({
                icon: '<?= session("msg_status") ?>',
                title: '<?= session("msg") ?>'
            })
        });
    });
</script>
@endif

<script>
    $(function () {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "order": [],
        });
    });
</script>

@yield("script")

</body>
</html>