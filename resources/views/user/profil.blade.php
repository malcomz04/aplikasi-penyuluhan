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
                                <div class="row">
                                    <div class="users-view-image">
                                        <img src="{{asset('images/user/'.Auth::user()->foto)}}"
                                            class="users-avatar-shadow  rounded mb-2 pr-2 ml-1" alt="avatar"
                                            width="35%">
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-5">
                                        <table class="table table-striped">
                                            <tr>
                                                <td class="font-weight-bold">Nama Kelompok Tani</td>
                                                <td>{{$data->kecamatan->kecamatan}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">Nama Admin</td>
                                                <td>{{$data->nama}}</td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold">username</td>
                                                <td>{{$data->username}}</td>
                                            </tr>
                                        </table>
                                        <br>
                                        <button class="btn btn-primary  mb-1 mb-sm-0 mr-0 " data-toggle="modal"
                                            data-target="#exampleModal">Edit Profil</button>
                                    </div>
                                </div>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('penjualanStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                        <input type="text" name="kecamatan" id="nama" class="form-control"
                            value="{{$data->kecamatan->kecamatan}}" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{$data->nama}}"
                            placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" id="nama" class="form-control" value="{{$data->username}}"
                            placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" id="nama" class="form-control" placeholder="Password">
                        <p class="text-danger">Isi Jika Ingin Merubah Password</p>
                    </div>
                    <div class="form-group">
                        <label for="">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control">
                        <p class="text-danger">Isi Jika Ingin Merubah Foto</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection