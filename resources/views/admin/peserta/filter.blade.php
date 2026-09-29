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
                        <h2 class="content-header-title float-left mb-0">Peserta</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Peserta</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">filter</a>
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
                                    <h4 class="card-title">Form Filter</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form action="" method="POST" target="_blank">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Pelatihan</label>
                                            <select name="pelatihan_id" id="" class="form-control">
                                                <option value="">-- pilih Pelatihan --</option>
                                                @foreach($pelatihan as $d)
                                                <option value="{{$d->id}}">{{$d->nama_pelatihan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                        <div class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <a href="{{Route('pesertaIndex')}}"
                                                class="btn btn-secondary  mb-1 mb-sm-0 mr-0 mr-sm-1"><i
                                                    class="feather icon-arrow-left"></i> Batal</a>
                                            <button type="submit" class="btn btn-primary  mb-1 mb-sm-0 mr-0 mr-sm-1"><i
                                                    class="feather icon-save"></i> cetak Data</button>
                                        </div>
                                    </form>
                                </div>
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