@extends('layouts.admin')

@section('content')
<!-- BEGIN: Content-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Beranda Admin</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Beranda</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Data list view starts -->
            <!-- Zero configuration table -->
            <!-- Card Captions and Overlay section start -->
            <section id="card-caps">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="{{asset('admin/app-assets/images/slider/04.jpg')}}"
                                    alt="Card image">
                                <div class="card-img-overlay overflow-hidden overlay-danger overlay-lighten-2">
                                    <h class="card-title text-white">Data Pelatihan</h4>
                                        <p class="card-text text-white"> {{$pelatihan->count()}} Data Pelatihan
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white border-0 box-shadow-0">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="{{asset('admin/app-assets/images/slider/04.jpg')}}"
                                    alt="Card image">
                                <div class="card-img-overlay overflow-hidden overlay-success">
                                    <h4 class="card-title text-white">Lahan</h4>
                                    <h4 class="card-text text-white">{{$lahan->count()}} Lahan Pertanian
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="{{asset('admin/app-assets/images/slider/04.jpg')}}"
                                    alt="Card image">
                                <div class="card-img-overlay overflow-hidden overlay-warning">
                                    <h4 class="card-title text-white">Tanaman</h4>
                                    <h4 class="card-text text-white"> {{$tanaman->count()}} Jenis tanaman
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card text-white border-0 box-shadow-0">
                            <div class="card-content">
                                <img class="card-img img-fluid" src="{{asset('admin/app-assets/images/slider/04.jpg')}}"
                                    alt="Card image">
                                <div class="card-img-overlay overflow-hidden overlay-info">
                                    <h4 class="card-title text-white">Penjualan</h4>
                                    <h4 class="card-text text-white">{{$penjualan->count()}} Data Penjualan</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>Selamat Datang Admin {{Auth::user()->nama}}</h3>
                                <hr>

                                <p>SELAMAT DATANG DI SISTEM INFORMASI MANAJEMEN DATA KELOMPOK TANI KECAMATAN DOLOK
                                    MASAGAL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection