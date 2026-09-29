<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Aplikasi Penyuluhan Pertanian</title>
    <link rel="apple-touch-icon" href="admin/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('admin/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('admin/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" type="text/css"
        href="{{asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/file-uploaders/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/pages/data-list-view.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css/style.css')}}">



</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        Aplikasi Manajemen Data Kelompok Pertanian
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600">{{Auth::user()->nama}}</span><span
                                        class="user-status">@if(Auth::user()->role == 2 ) Admin @else Kelompok Tani
                                        @endif</span></div><span><img class="round"
                                        src="{{asset('images/user/'. Auth::user()->foto)}}" alt="avatar" height="40"
                                        width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="feather icon-power"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{Route('adminIndex')}}">
                        <img src="{{asset('admin/app-assets/images/logo/vuexy-logo.png')}}" width="25px" alt="">
                        <h2 class="brand-text mb-0">Sipoktan</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @if(Auth::user()->role == 2)
                <li class=" active nav-item"><a href="{{Route('adminIndex')}}"><i class="feather icon-home"></i><span
                            class="menu-title" data-i18n="Dashboard">Beranda</span><span
                            class="badge badge badge-warning badge-pill float-right"></span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-database"></i><span class="menu-title"
                            data-i18n="Starter kit">Data Master</span></a>
                    <ul class="menu-content">
                        <li><a href="{{Route('userIndex')}}"><i></i><span class="menu-item" data-i18n="2 columns">User
                                </span></a>
                        </li>
                        <li><a href="{{Route('kecamatanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed navbar">User Poktan</span></a>
                        </li>

                        <!-- <li><a href="{{Route('modulIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed layout">Data Modul</span></a>
                        </li>
                        <li><a href="{{Route('evaluasiIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed layout">Form Evaluasi</span></a>
                        </li> -->
                    </ul>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-zap"></i><span class="menu-title"
                            data-i18n="Starter kit">Pelatihan</span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{Route('pelatihanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="2 columns">Data Pelatihan</span></a>
                        </li>
                        <!-- <li>
                            <a href="#"><i></i><span class="menu-item"
                                    data-i18n="2 columns">Data Pelatihan</span></a>
                         </li> -->
                        <li><a href="{{Route('pesertaIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Floating navbar">Peserta</span></a> </li>
                        <!-- <li><a href="sk-layout-floating-navbar.html"><i></i><span class="menu-item"
                                    data-i18n="Floating navbar">Evaluasi Peserta</span></a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-database"></i><span class="menu-title"
                            data-i18n="Starter kit">Penanaman</span></a>
                    <ul class="menu-content">
                        <li><a href="{{Route('bahanIndex')}}"><i></i><span class="menu-item" data-i18n="Fixed layout">
                                    Bibit Buah</span></a>
                        </li>

                        <li><a href="{{Route('pembelianBahanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed layout">Pembelian Bahan</span></a>
                        </li>
                        <li><a href="{{Route('lahanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="2 columns">Lahan</span></a>
                        </li>
                       
                    </ul>
                </li> -->
                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-database"></i><span class="menu-title"
                            data-i18n="Starter kit">Hasil Panen</span></a>
                    <ul class="menu-content">
                        <li>
                            <a href="{{Route('tanamanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed navbar">Tanaman</span></a>
                        </li>
                        <li><a href="{{Route('panenIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="2 columns">Panen</span></a>
                        </li>
                        <li><a href="{{Route('penjualanIndex')}}"><i></i><span class="menu-item"
                                    data-i18n="Fixed navbar">Penjualan</span></a>
                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="{{ route('kelompok_tani.index') }}">
                        <i class="feather icon-user"></i>
                        <span class="menu-title">Data Kelompok Tani</span>
                    </a>
                </li>
                <li class=" nav-item"><a href="{{Route('beritaIndex')}}"><i class="feather icon-file"></i><span
                            class="menu-title">Berita Kegiatan</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('kelompok_tani.laporan') }}">
                        <i class="feather icon-bar-chart-2"></i>
                        <span class="menu-title">Laporan Kelompok Tani</span>
                    </a>
                </li> -->
                <!-- <li class=" nav-item"><a href="{{Route('mahasiswaIndex')}}"><i class="feather icon-file"></i><span
                            class="menu-title">mahasiswa Kegiatan</span></a>
                </li> -->
                @endif
                @if(Auth::user()->role == 1)
                <li class=" active nav-item"><a href="{{Route('userDashboardIndex')}}"><i
                            class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Beranda
                            Poktan</span><span class="badge badge badge-warning badge-pill float-right"></span></a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kelompok_tani.index') }}">
                        <i class="feather icon-file"></i>
                        <span class="menu-title">Data Kelompok Tani</span>
                    </a>
                </li>
                <li class=" nav-item"><a href="{{Route('kecamatanProfil')}}"><i class="feather icon-user"></i><span
                            class="menu-title">Profil Kelompok Tani</span></a>
                </li>

                @endif
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2025<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent,</a>All rights Reserved</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->

    @include('sweetalert::alert')
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/app-assets/vendors/js/ui/prism.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin//app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/app-assets/js/scripts/datatables/datatable.js')}}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <!-- END: Page JS-->
    @yield('scripts')

</body>
<!-- END: Body-->

</html>