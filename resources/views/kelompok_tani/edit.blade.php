@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">

        {{-- Breadcrumbs --}}
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Kelompok Tani</h2>

                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('kelompok_tani.index') }}">Kelompok Tani</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Data</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- End Breadcrumbs --}}

        <div class="content-body">

            <section id="form-edit-anggota-tani">
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">
                                    Edit Anggota Kelompok Tani: {{ $kelompokTani->nama }}
                                </h4>
                            </div>

                            <form action="{{ route('kelompok_tani.update', $kelompokTani->id) }}" method="POST"
                                id="editKelompokTaniForm">
                                @csrf
                                @method('PUT')

                                <div class="card-content">
                                    <div class="card-body">

                                        {{-- Pesan Error --}}
                                        @if ($errors->any())
                                        <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                            <h4 class="alert-heading">Gagal Memperbarui Data!</h4>
                                            <p>Silakan periksa kembali input Anda.</p>
                                        </div>
                                        @endif

                                        {{-- Bagian I: Data Diri --}}
                                        <h5 class="mb-3 font-weight-bold text-primary">I. Data Diri Anggota</h5>

                                        <div class="row">

                                            {{-- No KK --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no_kk">No. Kartu Keluarga</label>
                                                    <input type="text" name="no_kk" id="no_kk"
                                                        class="form-control @error('no_kk') is-invalid @enderror"
                                                        value="{{ old('no_kk', $kelompokTani->no_kk) }}" required>

                                                    <small class="text-danger" data-error-for="no_kk">
                                                        {{ $errors->first('no_kk') }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- NIK --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" name="nik" id="nik"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        value="{{ old('nik', $kelompokTani->nik) }}" required>

                                                    <small class="text-danger" data-error-for="nik">
                                                        {{ $errors->first('nik') }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- Nama --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama Lengkap</label>
                                                    <input type="text" name="nama" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        value="{{ old('nama', $kelompokTani->nama) }}" required>

                                                    <small class="text-danger" data-error-for="nama">
                                                        {{ $errors->first('nama') }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- Kecamatan --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan (Otomatis)</label>

                                                    <input type="text" class="form-control bg-light"
                                                        value="{{ $kecamatanUser }}" readonly>

                                                    <input type="hidden" name="kecamatan" value="{{ $kecamatanUser }}">

                                                    <small class="text-info">
                                                        Kecamatan diambil dari akun Anda.
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- No Telepon --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no_telepon">No. Telepon</label>
                                                    <input type="text" name="no_telepon" id="no_telepon"
                                                        class="form-control @error('no_telepon') is-invalid @enderror"
                                                        value="{{ old('no_telepon', $kelompokTani->no_telepon) }}">

                                                    <small class="text-danger" data-error-for="no_telepon">
                                                        {{ $errors->first('no_telepon') }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- Luas Lahan --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="luas_lahan">Luas Lahan (Ha)</label>
                                                    <input type="number" step="0.01" name="luas_lahan" id="luas_lahan"
                                                        class="form-control @error('luas_lahan') is-invalid @enderror"
                                                        value="{{ old('luas_lahan', $kelompokTani->luas_lahan) }}"
                                                        required>

                                                    <small class="text-danger" data-error-for="luas_lahan">
                                                        {{ $errors->first('luas_lahan') }}
                                                    </small>
                                                </div>
                                            </div>

                                            {{-- Alamat --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="alamat" rows="3"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        required>{{ old('alamat', $kelompokTani->alamat) }}</textarea>

                                                    <small class="text-danger" data-error-for="alamat">
                                                        {{ $errors->first('alamat') }}
                                                    </small>
                                                </div>
                                            </div>

                                        </div>

                                        <hr class="mt-4 mb-4">

                                        {{-- Bagian II: Data Pertanian --}}
                                        <h5 class="mb-3 font-weight-bold text-primary">II. Data Pertanian</h5>

                                        <div class="row">

                                            {{-- Jenis Lahan --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="jenis_lahan">Jenis Lahan</label>

                                                    <select name="jenis_lahan" id="jenis_lahan"
                                                        class="form-control @error('jenis_lahan') is-invalid @enderror">

                                                        <option value="">-- Pilih Jenis Lahan --</option>

                                                        <option value="Sawah Irigasi"
                                                            {{ old('jenis_lahan', $kelompokTani->jenis_lahan) == 'Sawah Irigasi' ? 'selected' : '' }}>
                                                            Sawah Irigasi
                                                        </option>

                                                        <option value="Sawah Tadah Hujan"
                                                            {{ old('jenis_lahan', $kelompokTani->jenis_lahan) == 'Sawah Tadah Hujan' ? 'selected' : '' }}>
                                                            Sawah Tadah Hujan
                                                        </option>

                                                        <option value="Lahan Kering"
                                                            {{ old('jenis_lahan', $kelompokTani->jenis_lahan) == 'Lahan Kering' ? 'selected' : '' }}>
                                                            Lahan Kering
                                                        </option>

                                                    </select>

                                                    <small class="text-danger" data-error-for="jenis_lahan">
                                                        {{ $errors->first('jenis_lahan') }}
                                                    </small>

                                                </div>
                                            </div>

                                            {{-- Komoditas Tanam --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="komoditas_tanam">Komoditas Tanam</label>

                                                    <input type="text" name="komoditas_tanam" id="komoditas_tanam"
                                                        class="form-control @error('komoditas_tanam') is-invalid @enderror"
                                                        value="{{ old('komoditas_tanam', $kelompokTani->komoditas_tanam) }}"
                                                        required>

                                                    <small class="text-danger" data-error-for="komoditas_tanam">
                                                        {{ $errors->first('komoditas_tanam') }}
                                                    </small>

                                                </div>
                                            </div>

                                            {{-- Periode Tanam --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="periode_tanam">Periode Tanam Terakhir</label>

                                                    <input type="date" name="periode_tanam" id="periode_tanam"
                                                        class="form-control @error('periode_tanam') is-invalid @enderror"
                                                        value="{{ old('periode_tanam', $kelompokTani->periode_tanam) }}">

                                                    <small class="text-danger" data-error-for="periode_tanam">
                                                        {{ $errors->first('periode_tanam') }}
                                                    </small>

                                                </div>
                                            </div>

                                            {{-- Kebutuhan Pupuk --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kebutuhan_pupuk">Kebutuhan Pupuk (Jenis &
                                                        Jumlah)</label>

                                                    <input type="text" name="kebutuhan_pupuk" id="kebutuhan_pupuk"
                                                        class="form-control @error('kebutuhan_pupuk') is-invalid @enderror"
                                                        value="{{ old('kebutuhan_pupuk', $kelompokTani->kebutuhan_pupuk) }}">

                                                    <small class="text-danger" data-error-for="kebutuhan_pupuk">
                                                        {{ $errors->first('kebutuhan_pupuk') }}
                                                    </small>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Footer --}}
                                <div class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        Perbarui Data
                                    </button>

                                    <a href="{{ route('kelompok_tani.index') }}" class="btn btn-outline-secondary">
                                        Batal
                                    </a>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </section>

        </div>

    </div>

</div>

@endsection