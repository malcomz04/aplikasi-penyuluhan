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
                        <h2 class="content-header-title float-left mb-0">Data Tanaman</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Tanaman</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data</a>
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
                                    <h4 class="card-title">Tabel Data</h4>
                                </div>
                                <div class="col-6 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <a href="{{Route('tanamanCetak')}}"
                                        class="btn btn-secondary  mb-1 mb-sm-0 mr-0 mr-sm-1" target="_blank"><i
                                            class="feather icon-printer"></i> Cetak Data</a>
                                    <button class="btn btn-primary  mb-1 mb-sm-0 mr-0 " data-toggle="modal"
                                        data-target="#exampleModal">Tambah Data</button>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Tanaman</th>
                                                    <th>Nama Tanaman</th>
                                                    <th>Stok</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kode_tanaman}}</td>
                                                    <td>{{$d->nama_tanaman}}</td>
                                                    <td>{{$d->stok}}</td>
                                                    <td>Rp. {{$d->harga}} / {{$d->satuan}}</td>
                                                    <td>
                                                        {{--  <a href="{{Route('tanamanShow',['uuid' => $d->uuid])}}"
                                                        class="btn btn-icon btn-primary"><i
                                                            class="feather icon-info"></i></a> --}}
                                                        <a href="{{Route('tanamanEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-warning"><i
                                                                class="feather icon-edit"></i></a>
                                                        <button onclick="Hapus('{{$d->uuid}}')" class="btn btn-icon btn-danger"><i
                                                                class="feather icon-delete"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Tanaman</th>
                                                    <th>Nama Tanaman</th>
                                                    <th>Stok</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{Route('tanamanStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Kode tanaman</label>
                        <input type="text" name="kode_tanaman" id="kode_tanaman" class="form-control"
                            placeholder="Kode Buah">
                    </div>
                    <div class="form-group">
                        <label for="">Nama tanaman</label>
                        <input type="text" name="nama_tanaman" id="nama_tanaman" class="form-control"
                            placeholder="Nama Buah">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Stok</label>
                            <input type="text" name="stok" id="stok" class="form-control" placeholder="Kode Buah">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="">-- pilih Satuan --</option>
                                    <option value="Buah">Buah</option>
                                    <option value="Kilo">Kilo</option>
                                    <option value="Ons">Ons</option>
                                    <option value="Gram">Gram</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Satuan</label>
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Kode Buah">
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
@section('scripts')
<script>
    function Hapus(uuid) {
                Swal.fire({
                title: 'Anda Yakin?',
                text: " Menghapus data Buah" ,        
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                url = '{{route("tanamanDestroy",'')}}'; 
                window.location.href =  url+'/'+uuid ;
                }
            })
            }
</script>
@endsection