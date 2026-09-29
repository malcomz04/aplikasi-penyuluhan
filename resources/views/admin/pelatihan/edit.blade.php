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
                        <h2 class="content-header-title float-left mb-0">Data Pelatihan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Pelatihan</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Edit</a>
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
                                    <h4 class="card-title">Form Input</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Nama Pelatihan</label>
                                            <input type="text" name="nama_pelatihan" id="nama_pelatihan"
                                                class="form-control" value="{{$data->nama_pelatihan}}"
                                                placeholder="Nama Pelatihan">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Narasumber</label>
                                            <input type="text" name="narasumber" id="narasumber"
                                                value="{{$data->narasumber}}" class="form-control"
                                                placeholder="Nama Narasumber">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai</label>
                                            <input type="date" value="{{$data->tgl_mulai}}" name="tgl_mulai"
                                                id="tgl_mulai" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Selesai</label>
                                            <input type="date" value="{{$data->tgl_selesai}}" name="tgl_selesai"
                                                id="tgl_selesai" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <textarea name="uraian" id="keterangan" class="form-control"
                                                rows="10">{{$data->uraian}}</textarea>
                                        </div>
                                </div>
                                <div class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <a href="{{Route('pelatihanIndex')}}"
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