@extends('layouts.user')

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
                                    <h4 class="card-title">Form Edit</h4>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <form action="" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Kelompok Tani
                                            </label>
                                            <select name="kecamatan_id" id="" class="form-control">
                                                <option value="">-- pilih Kelompok Tani --</option>
                                                @foreach($kecamatan as $d)
                                                <option value="{{$d->id}}"
                                                    {{$data->kecamatan_id == $d->id ? 'selected' : ''}}>
                                                    {{$d->kecamatan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Pelatihan</label>
                                            <select name="pelatihan_id" id="" class="form-control">
                                                <option value="">-- pilih Pelatihan --</option>
                                                @foreach($pelatihan as $d)
                                                <option value="{{$d->id}}"
                                                    {{$data->pelatihan_id == $d->id ? 'selected' : ''}}>
                                                    {{$d->nama_pelatihan}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor SPT</label>
                                            <input type="text" value="{{$data->no_spt}}" name="no_spt"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal SPT</label>
                                            <input type="date" value="{{$data->tgl_spt}}" name="tgl_spt"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Peserta</label>
                                            <input type="text" value="{{$data->nama_peserta}}" name="nama_peserta"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <input type="text" value="{{$data->NIK}}" name="NIK" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jk" id="jk" class="form-control">
                                                <option value="1" {{$data->jk ==  '1' ? 'selected' : ''}}>Laki-laki
                                                </option>
                                                <option value="2" {{$data->jk ==  '1' ? 'selected' : ''}}>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tempat Lahir</label>
                                                    <input type="text" value="{{$data->tempat_lahir}}"
                                                        name="tempat_lahir" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Tanggal Lahir</label>
                                                    <input type="date" value="{{$data->tgl_lahir}}" name="tgl_lahir"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="alamat" id="alamat"
                                                class="form-control">{{$data->alamat}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" {{$data->status == '1' ? 'selected' : ''}}>Aktif
                                                </option>
                                            </select>
                                        </div>
                                        <div
                                            class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <a href="{{Route('anggotaIndex')}}"
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
                </div>
            </section>
            <!--/ Zero configuration table -->
            <!-- Data list view end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection