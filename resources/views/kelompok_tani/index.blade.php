@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">

        {{-- BREADCRUMB --}}
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Data Anggota Kelompok Tani</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Kelompok Tani</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="content-body">

            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            {{-- HEADER CARD --}}
                            <div class="card-header">

                                <div class="col-6">
                                    <h4 class="card-title">Tabel Data</h4>
                                </div>

                                <div class="col-6 d-flex flex-sm-row flex-column justify-content-end mt-1">


                                    {{-- Tombol Print --}}
                                    <a href="{{ route('kelompok_tani.print', request()->query()) }}" target="_blank"
                                        class="btn btn-secondary mb-1 mr-sm-1">
                                        <i class="feather icon-printer"></i> Cetak Data
                                    </a>

                                    {{-- Tombol PDF --}}
                                    <a href="{{ route('kelompok_tani.downloadPdf', request()->query()) }}"
                                        target="_blank" class="btn btn-danger mb-1 mr-sm-1">
                                        <i class="feather icon-file"></i> Download PDF
                                    </a>
                                </div>
                            </div>

                            {{-- FILTER KHUSUS USER --}}
                            @if(Auth::user()->role == 2)
                            <div class="card-body border-top">
                                <h5 class="card-title mb-1">Filter Data</h5>

                                <form method="GET" action="{{ route('kelompok_tani.index') }}"
                                    class="form-row align-items-end">

                                    <div class="form-group col-md-8">
                                        <label for="kecamatan">Pilih Kelompok Tani:</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control">
                                            <option value="">-- Semua Kelompok Tani --</option>
                                            @foreach($daftarKecamatan as $kec)
                                            <option value="{{ $kec }}"
                                                {{ request('kecamatan') == $kec ? 'selected' : '' }}>
                                                {{ $kec }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4 d-flex mt-1 mt-md-0">
                                        <button class="btn btn-info mr-1">
                                            <i class="feather icon-search"></i> Terapkan
                                        </button>

                                        @if(request('kecamatan'))
                                        <a href="{{ route('kelompok_tani.index') }}" class="btn btn-outline-secondary">
                                            Reset
                                        </a>
                                        @endif
                                    </div>

                                </form>
                            </div>
                            @endif
 {{-- FILTER SEJAJAR DENGAN LEBAR TABEL --}}
<div class="card-body border-top bg-light-secondary">
    <form method="GET" action="{{ route('kelompok_tani.index') }}">
        <div class="row align-items-center">

            {{-- Bagian Kiri: Input NIK --}}
            <div class="col-md-4">
                <label class="font-weight-bold">NIK (Exact Match):</label>
                <div class="position-relative has-icon-left">
                    <input type="text" name="search_nik" class="form-control"
                           placeholder="Masukkan 16 digit NIK..." value="{{ request('search_nik') }}">
                    <div class="form-control-position">
                        <i class="feather icon-hash"></i>
                    </div>
                </div>
            </div>

            {{-- Bagian Tengah: Filter Kecamatan --}}
            <div class="col-md-4">
                <label class="font-weight-bold">Filter Wilayah:</label>
                <select name="kecamatan" class="form-control">
                    <option value="">-- Semua Kelompok Tani --</option>
                    @foreach($daftarKecamatan as $kec)
                    <option value="{{ $kec }}" {{ request('kecamatan') == $kec ? 'selected' : '' }}>
                        {{ $kec }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Bagian Kanan: Tombol Aksi --}}
            <div class="col-md-4">
                <label class="d-none d-md-block">&nbsp;</label>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary shadow w-100 mr-1">
                        <i class="feather icon-search"></i> Cari Data
                    </button>

                    @if(request('search_nik') || request('kecamatan'))
                        <a href="{{ route('kelompok_tani.index') }}" class="btn btn-outline-danger w-100">
                            <i class="feather icon-refresh-cw"></i> Reset
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </form>
</div>

    {{-- BARU KEMUDIAN MASUK KE BAGIAN TABEL --}}
    <div class="card-body card-dashboard">
        <div class="table-responsive">
            <table class="table zero-configuration">
                ...
            </table>
        </div>
    </div>
</div>


                            {{-- TABLE --}}
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    {{-- Info Filter --}}
                                    @if(request('kecamatan'))
                                    <p class="text-info mb-2">
                                        <i class="feather icon-filter"></i>
                                        Menampilkan data Kelompok Tani:
                                        <strong>{{ request('kecamatan') }}</strong>
                                    </p>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead style="background: #f1f2f7; font-weight: 600;">
                                                <tr>
                                                    <th>No</th>
                                                    <th>No KK</th>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>No. Telepon</th>
                                                    <th>Kelompok Tani</th>
                                                    <th>Luas Lahan (Ha)</th>
                                                    <th>Jenis Lahan</th>
                                                    <th>Komoditas Tanam</th>
                                                    <th>Periode Tanam</th>
                                                    <th>Kebutuhan Pupuk (Kg/Ha)</th>
                                                    @if(Auth::user()->role != 2)
                                                    <th>Aksi</th>
                                                    @endif
                                                </tr>
                                            </thead>

                                            <tbody style="background: #ffffff;">
                                                @foreach($kelompokTani as $i => $d)
                                                <tr>
                                                    <td>{{ $kelompokTani->firstItem() + $i }}</td>
                                                    <td>{{ $d->no_kk }}</td>
                                                    <td>{{ $d->nik }}</td>
                                                    <td>{{ $d->nama }}</td>
                                                    <td>{{ $d->alamat }}</td>
                                                    <td>{{ $d->no_telepon }}</td>
                                                    <td>{{ $d->kecamatan }}</td>
                                                    <td>{{ $d->luas_lahan }}</td>
                                                    <td>{{ $d->jenis_lahan }}</td>
                                                    <td>{{ $d->komoditas_tanam }}</td>
                                                    <td>
                                                        {{ $d->periode_tanam
                                                            ? \Carbon\Carbon::parse($d->periode_tanam)->format('d/m/Y')
                                                            : '-'
                                                        }}
                                                    </td>
                                                    <td>{{ $d->kebutuhan_pupuk }}</td>

                                                    {{-- Aksi hanya admin & penyuluh --}}
                                                    @if(Auth::user()->role != 2)
                                                    <td class="text-center">

                                                        {{-- Hanya pemilik data atau admin --}}
                                                        @if($d->user_id == Auth::id() || Auth::user()->role == 1)

                                                        <a href="{{ route('kelompok_tani.edit', $d->id) }}"
                                                            class="btn btn-icon btn-warning">
                                                            <i class="feather icon-edit"></i>
                                                        </a>

                                                        <form id="delete-form-{{ $d->id }}" method="POST"
                                                            action="{{ route('kelompok_tani.destroy', $d->id) }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                onclick="Hapus('delete-form-{{ $d->id }}','{{ $d->nama }}')"
                                                                class="btn btn-icon btn-danger">
                                                                <i class="feather icon-delete"></i>
                                                            </button>
                                                        </form>

                                                        @else
                                                        <span class="text-muted">
                                                            <i class="feather icon-lock"></i>
                                                        </span>
                                                        @endif

                                                    </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>

                                    {{-- PAGINATION --}}
                                    <div class="mt-2">
                                        {{ $kelompokTani->appends(request()->query())->links() }}
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

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function Hapus(formId, nama) {
    Swal.fire({
        title: 'Yakin Hapus?',
        text: `Menghapus data "${nama}"!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(formId).submit();
        }
    });
}
</script>
@endsection
