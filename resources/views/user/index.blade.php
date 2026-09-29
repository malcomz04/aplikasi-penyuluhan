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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Selamat Datang Ketua Poktan {{Auth::user()->kecamatan->kecamatan}} :
                                    {{Auth::user()->nama}}</h4>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p>Pelatihan Berlangsung</p>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelatihan</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pelatihan as $d)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$d->nama_pelatihan}}</td>
                                                <td>{{carbon\carbon::parse($d->tgl_mulai)->translatedFormat('d F Y')}}
                                                </td>
                                                <td>{{carbon\carbon::parse($d->tgl_selesai)->translatedFormat('d F Y')}}
                                                </td>
                                                <td>
                                                    <a href="{{Route('tambahPeserta',['uuid' => $d->uuid])}}"
                                                        class="btn btn-icon btn-primary"><i
                                                            class="feather icon-info"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode evaluasi</th>
                                                <th>Nama Evaluasi</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Card Captions and Overlay section end -->
            <!--/ Zero configuration table -->
            <!-- Data list view end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection