@extends('layouts.admin')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Penjualan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Penjualan</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Filter</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-6">
                                    <h4 class="card-title">filter Waktu</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form action="" method="POST" target="_blank">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Periode Tanggal Mulai</label>
                                                <input type="date" name="tgl_mulai"  id="tgl_mulai"
                                                    class="form-control" placeholder="julah Panen">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Periode Tanggal Akhir</label>
                                                    <input type="date" name="tgl_akhir"  id="tgl_akhir"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <a href="{{Route('penjualanIndex')}}"
                                        class="btn btn-secondary  mb-1 mb-sm-0 mr-0 mr-sm-1"><i
                                            class="feather icon-arrow-left"></i> Batal</a>
                                    <button type="submit" class="btn btn-primary  mb-1 mb-sm-0 mr-0 mr-sm-1"><i
                                            class="feather icon-save"></i> Ubah Data</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
            <!-- Data list view end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection