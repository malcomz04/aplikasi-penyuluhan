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
                        <h2 class="content-header-title float-left mb-0">Data Peserta Pelatihan</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Peserta Pelatihan</a></li>
                                <li class="breadcrumb-item"><a href="#">Data</a></li>
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
                                    <a href="{{Route('pesertaFilter')}}"
                                        class="btn btn-secondary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <i class="feather icon-printer"></i> Cetak Data
                                    </a>

                                    <button class="btn btn-primary mb-1 mb-sm-0 mr-0" data-toggle="modal"
                                        data-target="#exampleModal">
                                        + Tambah Data
                                    </button>
                                </div>
                            </div>

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="table-responsive">

                                        <!-- Ubah ID tabel agar DataTables bisa di-inisialisasi -->
                                        <table id="pesertaTable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pelatihan</th>
                                                    <th>Nama</th>
                                                    <th>Nomor SPT</th>
                                                    <th>Tanggal SPT</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Tanggal Lahir</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($data as $d)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $d->pelatihan->nama_pelatihan }}</td>
                                                    <td>{{ $d->nama_peserta }}</td>
                                                    <td>{{ $d->no_spt }}</td>
                                                    <td>{{ Carbon\Carbon::parse($d->tgl_spt)->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ $d->jk == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                                    <td>{{ $d->tempat_lahir }},
                                                        {{ Carbon\Carbon::parse($d->tgl_lahir)->translatedFormat('d F Y') }}
                                                    </td>
                                                    <td>{{ $d->alamat }}</td>
                                                    <td>
                                                        <a href="{{Route('pesertaEdit',['uuid' => $d->uuid])}}"
                                                            class="btn btn-icon btn-warning">
                                                            <i class="feather icon-edit"></i>
                                                        </a>

                                                        <button
                                                            onclick="Hapus('{{ $d->uuid }}', '{{ $d->nama_peserta }}')"
                                                            class="btn btn-icon btn-danger">
                                                            <i class="feather icon-delete"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Pelatihan</th>
                                                    <th>Nama</th>
                                                    <th>Nomor SPT</th>
                                                    <th>Tanggal SPT</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Tanggal Lahir</th>
                                                    <th>Alamat</th>
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

<!-- Modal Tambah Data -->
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
                <form action="{{Route('pesertaStore')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Pelatihan</label>
                        <select name="pelatihan_id" class="form-control">
                            <option value="">-- pilih Pelatihan --</option>
                            @foreach($pelatihan as $d)
                            <option value="{{$d->id}}">{{ $d->nama_pelatihan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor SPT</label>
                        <input type="text" name="no_spt" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tanggal SPT</label>
                        <input type="date" name="tgl_spt" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" name="nama_peserta" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="NIK" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" class="form-control">
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kelompok Tani Asal</label>
                        <select name="kecamatan_id" class="form-control">
                            <option value="">-- pilih Kelompok Tani --</option>
                            @foreach($kecamatan as $d)
                            <option value="{{ $d->id }}">{{ $d->kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">-- Aktif --</option>
                        </select>
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

<!-- Inisialisasi DataTables -->
<script>
$(document).ready(function() {
    $('#pesertaTable').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "Semua"]
        ],
        pageLength: 10,
        responsive: true
    });
});
</script>

<!-- Script Hapus -->
<script>
function Hapus(uuid, nama) {
    Swal.fire({
        title: 'Anda Yakin?',
        text: "Menghapus data Peserta " + nama,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = "{{ route('pesertaDestroy', '') }}";
            window.location.href = url + '/' + uuid;
        }
    });
}
</script>

@endsection