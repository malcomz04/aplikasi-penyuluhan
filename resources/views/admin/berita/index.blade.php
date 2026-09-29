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
                        <h2 class="content-header-title float-left mb-0">Data Berita Kegiatan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Berita Kegiatan</a>
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
                                    <!-- <button class="btn btn-secondary  mb-1 mb-sm-0 mr-0 mr-sm-1"><i
                                            class="feather icon-printer"></i> Cetak Data</button> -->
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
                                                    <th>Judul</th>
                                                    <th>Ringkasan</th>
                                                    <th>Tanggal Upload</th>
                                                    <th>Penulis</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$d->judul}}</td>
                                                    <td>{{ \Illuminate\Support\Str::limit($d->isi, 250, $end='...') }}</td>
                                                    <td>{{carbon\carbon::parse($d->created_at)->translatedFormat('d F Y')}}
                                                    </td>
                                                    <td>{{$d->user->nama}}</td>
                                                    <td>
                                                        <a href="{{Route('beritaShow',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-primary m-1"><i
                                                                class="feather icon-info"></i></a>
                                                        <a href="{{Route('beritaEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-warning m-1"><i
                                                                class="feather icon-edit"></i></a>
                                                        <button onclick="Hapus('{{$d->uuid}}','{{$d->judul}}')" class="btn btn-icon btn-danger m-1"><i
                                                                class="feather icon-delete"></i></button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Ringkasan</th>
                                                    <th>Tanggal Upload</th>
                                                    <th>Penulis</th>
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
                <form action="{{Route('beritaStore')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Nama Pelatihan">
                    </div>
                    <div class="form-group">
                        <label for="">Isi</label>
                        <textarea name="isi" id="isi" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">thubnail</label>
                        <input type="file" name="foto" id="foto" class="form-control">
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
                text: " Menghapus data Berita" + nama ,        
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                url = '{{route("beritaDestroy",'')}}';
                window.location.href =  url+'/'+uuid ;
                }
            })
            }
        </script>
    @endsection