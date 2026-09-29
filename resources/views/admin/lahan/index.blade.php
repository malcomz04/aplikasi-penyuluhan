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
                        <h2 class="content-header-title float-left mb-0">Data Lahan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Lahan</a>
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
                                    <h4 class="card-title">Tabel Data </h4>
                                </div>
                                <div class="col-6 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <a href="{{Route('lahanCetak')}}"
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
                                                    <th>Kode Lahan</th>
                                                    <th>Luas lahan</th>
                                                    <th>Lokasi Lahan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kode_lahan}}</td>
                                                    <td>{{$d->luas_lahan}} {{$d->satuan}}</td>
                                                    <td>{{$d->lokasi}}</td>
                                                    <td>
                                                        <a href="{{Route('lahanShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-primary"><i
                                                                class="feather icon-info"></i></a>
                                                        <a href="{{Route('lahanEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-warning"><i
                                                                class="feather icon-edit"></i></a>
                                                        <button onclick="Hapus('{{$d->uuid}}','{{$d->lokasi}}')"
                                                            class="btn btn-icon btn-danger"><i
                                                                class="feather icon-delete"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Lahan</th>
                                                    <th>Luas lahan</th>
                                                    <th>Lokasi Lahan</th>
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
                <form action="{{Route('lahanStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Kode Lahan</label>
                        <input type="text" name="kode_lahan" id="kode_lahan" class="form-control"
                            placeholder="Kode Lahan">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Luas Lahan</label>
                                <input type="text" name="luas_lahan" id="luas_lahan" class="form-control"
                                    placeholder="Luas lahan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="">-- pilih Satuan --</option>
                                    <option value="m">
                                        <p>m <sup>2</sup></p>
                                    </option>
                                    <option value="Hektar">Hektar</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Lokasi Lahan</label>
                        <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi">
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
    function Hapus(uuid, nama) {
                Swal.fire({
                title: 'Anda Yakin?',
                text: " Menghapus data Lahan" + nama ,        
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                url = '{{route("lahanDestroy",'')}}';
                window.location.href =  url+'/'+uuid ;
                }
            })
            }
</script>
@endsection