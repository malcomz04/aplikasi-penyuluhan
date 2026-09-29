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
                        <h2 class="content-header-title float-left mb-0">Data Panen</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Panen</a>
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
                                    <a href="{{Route('panenFilter')}}"
                                        class="btn btn-secondary  mb-1 mb-sm-0 mr-0 mr-sm-1" ><i
                                            class="feather icon-filter"></i> Filter Data</a>
                                    <a href="{{Route('panenCetak')}}"
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
                                                    <th>Kode Panen</th>
                                                    <th>Penanaman</th>
                                                    <th>Tanaman</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Panen</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->kode_panen}}</td>
                                                    <td>Tanggal
                                                        {{carbon\carbon::parse($d->penanaman->tanggal)->translatedFormat('d F Y')}},
                                                        {{$d->penanaman->lokasi}}
                                                    </td>
                                                    <td>{{$d->tanaman->nama_tanaman}}</td>
                                                    <td>{{$d->jumlah}}</td>
                                                    {{--  <td>{{$d->penanaman->bahan->nama_bahan}}</td> --}}
                                                    <td>{{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>
                                                        <a href="{{Route('panenEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-warning"><i
                                                                class="feather icon-edit"></i></a>
                                                        <button onclick="Hapus('{{$d->uuid}}','{{$d->kode_panen}}')"
                                                            class="btn btn-icon btn-danger"><i
                                                                class="feather icon-delete"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Panen</th>
                                                    <th>Penanaman</th>
                                                    <th>Jumlah</th>
                                                    <th>Tanggal Panen</th>
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
                <form action="{{Route('panenStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Penanaman</label>
                        <select name="penanaman_id" id="" class="form-control">
                            <option value="">-- pilih Penanaman --</option>
                            @foreach($penanaman as $d)
                            <option value="{{$d->id}}">Tanggal
                                {{carbon\carbon::parse($d->tanggal)->translatedFormat('d F Y')}},
                                {{$d->lahan->lokasi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanaman</label>
                        <select name="tanaman_id" id="" class="form-control">
                            <option value="">-- pilih Tanaman --</option>
                            @foreach($tanaman as $d)
                            <option value="{{$d->id}}">
                                {{$d->nama_tanaman}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kode panen</label>
                        <input type="text" name="kode_panen" id="kode_panen" class="form-control"
                            placeholder="Kode Panen">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="julah Panen">
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <select name="satuan" id="" class="form-control">
                                    <option value="">-- pilih Satuan --</option>
                                    <option value="Buah">Buah</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Ons">Ons</option>
                                    <option value="gram">gram</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
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
                text: " Menghapus data panen kode" + nama ,        
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                url = '{{route("panenDestroy",'')}}';
                window.location.href =  url+'/'+uuid ;
                }
            })
            }
</script>
@endsection