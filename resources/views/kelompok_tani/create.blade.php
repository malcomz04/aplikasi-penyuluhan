@extends('layouts.admin')

@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        {{-- Breadcrumbs Section (Seperti contoh) --}}
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
                                <li class="breadcrumb-item active">Tambah Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Breadcrumbs --}}

        <div class="content-body">
            <section id="form-tambah-anggota-tani">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Form Tambah Anggota Kelompok Tani</h4>
                            </div>

                            <form action="{{ route('kelompok_tani.store') }}" method="POST" id="createKelompokTaniForm"
                                data-redirect-url="{{ route('kelompok_tani.index') }}">
                                @csrf

                                <div class="card-content">
                                    <div class="card-body">

                                        {{-- Pesan AJAX --}}
                                        <div id="js-alert-messages" class="mb-3"></div>

                                        {{-- Pesan error umum --}}
                                        @if ($errors->any())
                                        <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                            <h4 class="alert-heading">Gagal Menyimpan Data!</h4>
                                            <p>Silakan periksa kembali input Anda.</p>
                                        </div>
                                        @endif

                                        {{-- Bagian I: Data Anggota --}}
                                        <h5 class="mb-3 font-weight-bold text-primary">I. Data Diri Anggota</h5>
                                        <div class="row">
                                            {{-- No KK --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no_kk">No. Kartu Keluarga</label>
                                                    <input type="text" name="no_kk" id="no_kk"
                                                        class="form-control @error('no_kk') is-invalid @enderror"
                                                        placeholder="Nomor Kartu Keluarga" value="{{ old('no_kk') }}"
                                                        required>
                                                    <small class="text-danger"
                                                        data-error-for="no_kk">{{ $errors->first('no_kk') }}</small>
                                                </div>
                                            </div>

                                            {{-- NIK --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nik">NIK</label>
                                                    <input type="text" name="nik" id="nik"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}"
                                                        required>
                                                    <small class="text-danger"
                                                        data-error-for="nik">{{ $errors->first('nik') }}</small>
                                                </div>
                                            </div>

                                            {{-- Nama --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="nama">Nama Lengkap</label>
                                                    <input type="text" name="nama" id="nama"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        placeholder="Nama Lengkap Anggota" value="{{ old('nama') }}"
                                                        required>
                                                    <small class="text-danger"
                                                        data-error-for="nama">{{ $errors->first('nama') }}</small>
                                                </div>
                                            </div>

                                            {{-- Kecamatan (Otomatis) --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kecamatan">Kecamatan (Otomatis)</label>
                                                    <input type="text" class="form-control bg-light"
                                                        value="{{ $kecamatanUser ?? 'Tidak Ditemukan' }}" readonly>
                                                    <input type="hidden" name="kecamatan"
                                                        value="{{ $kecamatanUser ?? '' }}">
                                                    <small class="text-info">Data kecamatan diambil dari akun
                                                        Anda.</small>
                                                    <small class="text-danger"
                                                        data-error-for="kecamatan">{{ $errors->first('kecamatan') }}</small>
                                                </div>
                                            </div>

                                            {{-- No. Telepon --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="no_telepon">No. Telepon</label>
                                                    <input type="text" name="no_telepon" id="no_telepon"
                                                        class="form-control @error('no_telepon') is-invalid @enderror"
                                                        placeholder="Contoh: 0812xxxxxx"
                                                        value="{{ old('no_telepon') }}">
                                                    <small class="text-danger"
                                                        data-error-for="no_telepon">{{ $errors->first('no_telepon') }}</small>
                                                </div>
                                            </div>

                                            {{-- Luas Lahan (Ha) --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="luas_lahan">Luas Lahan (Ha)</label>
                                                    <input type="number" step="0.01" name="luas_lahan" id="luas_lahan"
                                                        class="form-control @error('luas_lahan') is-invalid @enderror"
                                                        placeholder="Contoh: 0.50" value="{{ old('luas_lahan') }}"
                                                        required>
                                                    <small class="text-danger"
                                                        data-error-for="luas_lahan">{{ $errors->first('luas_lahan') }}</small>
                                                </div>
                                            </div>

                                            {{-- Alamat --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="alamat">Alamat Lengkap</label>
                                                    <textarea name="alamat" id="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        rows="3" placeholder="Alamat Tinggal Lengkap"
                                                        required>{{ old('alamat') }}</textarea>
                                                    <small class="text-danger"
                                                        data-error-for="alamat">{{ $errors->first('alamat') }}</small>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="mt-4 mb-4">

                                        {{-- Bagian II: Informasi Pertanian --}}
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
                                                            {{ old('jenis_lahan') == 'Sawah Irigasi' ? 'selected' : '' }}>
                                                            Sawah Irigasi</option>
                                                        <option value="Sawah Tadah Hujan"
                                                            {{ old('jenis_lahan') == 'Sawah Tadah Hujan' ? 'selected' : '' }}>
                                                            Sawah Tadah Hujan</option>
                                                        <option value="Lahan Kering"
                                                            {{ old('jenis_lahan') == 'Lahan Kering' ? 'selected' : '' }}>
                                                            Lahan Kering</option>
                                                    </select>
                                                    <small class="text-danger"
                                                        data-error-for="jenis_lahan">{{ $errors->first('jenis_lahan') }}</small>
                                                </div>
                                            </div>

                                            {{-- Komoditas Tanam --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="komoditas_tanam">Komoditas Tanam</label>
                                                    <input type="text" name="komoditas_tanam" id="komoditas_tanam"
                                                        class="form-control @error('komoditas_tanam') is-invalid @enderror"
                                                        placeholder="Contoh: Padi, Jagung, Cabai"
                                                        value="{{ old('komoditas_tanam') }}" required>
                                                    <small class="text-danger"
                                                        data-error-for="komoditas_tanam">{{ $errors->first('komoditas_tanam') }}</small>
                                                </div>
                                            </div>

                                            {{-- Periode Tanam Terakhir --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="periode_tanam">Periode Tanam Terakhir</label>
                                                    <input type="date" name="periode_tanam" id="periode_tanam"
                                                        class="form-control @error('periode_tanam') is-invalid @enderror"
                                                        value="{{ old('periode_tanam') }}">
                                                    <small class="text-danger"
                                                        data-error-for="periode_tanam">{{ $errors->first('periode_tanam') }}</small>
                                                </div>
                                            </div>

                                            {{-- Kebutuhan Pupuk (Jenis & Jumlah) --}}
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="kebutuhan_pupuk">Kebutuhan Pupuk (Jenis &
                                                        Jumlah)</label>
                                                    <input type="text" name="kebutuhan_pupuk" id="kebutuhan_pupuk"
                                                        class="form-control @error('kebutuhan_pupuk') is-invalid @enderror"
                                                        placeholder="Contoh: Urea 50kg, NPK 25kg"
                                                        value="{{ old('kebutuhan_pupuk') }}">
                                                    <small class="text-danger"
                                                        data-error-for="kebutuhan_pupuk">{{ $errors->first('kebutuhan_pupuk') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Footer (Tombol) --}}
                                <div class="card-footer d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <a href="{{ route('kelompok_tani.index') }}"
                                        class="btn btn-secondary mb-1 mb-sm-0 mr-0 mr-sm-1">
                                        <i class="feather icon-arrow-left"></i> Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1"
                                        id="submitButton">
                                        <i class="feather icon-save"></i> Simpan Data
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

{{-- SCRIPT AJAX FORM SUBMIT --}}
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('createKelompokTaniForm');
    const alertMessages = document.getElementById('js-alert-messages');
    const submitButton = document.getElementById('submitButton');
    const redirectUrl = form.getAttribute('data-redirect-url');

    function clearErrors() {
        document.querySelectorAll('.text-danger[data-error-for]').forEach(el => el.textContent = '');
        document.querySelectorAll('.form-control.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        alertMessages.innerHTML = '';
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        clearErrors();

        const formData = new FormData(form);
        submitButton.disabled = true;
        submitButton.innerHTML =
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';

        axios.post(form.action, formData)
            .then(response => {
                alertMessages.innerHTML =
                    '<div class="alert alert-success">Data Kelompok Tani berhasil disimpan. Mengarahkan...</div>';

                // Menggunakan setTimeout untuk memberi waktu user melihat pesan sukses sebelum redirect
                setTimeout(() => {
                    window.location.href = redirectUrl;
                }, 500); // Tunggu 0.5 detik
            })
            .catch(error => {
                submitButton.disabled = false;
                submitButton.innerHTML = '<i class="feather icon-save"></i> Simpan Data';

                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;

                    // Menampilkan pesan error validasi spesifik di bawah field
                    for (const field in errors) {
                        const inputEl = document.getElementById(field);
                        if (inputEl) inputEl.classList.add('is-invalid');

                        const errorEl = document.querySelector(
                            `.text-danger[data-error-for="${field}"]`);
                        if (errorEl) errorEl.textContent = errors[field][0];
                    }

                    // Menampilkan pesan error umum
                    alertMessages.innerHTML =
                        '<div class="alert alert-warning">Terdapat kesalahan input, mohon periksa kembali.</div>';
                } else {
                    // Menampilkan error server/koneksi
                    alertMessages.innerHTML =
                        '<div class="alert alert-danger">Terjadi kesalahan. Periksa koneksi atau server.</div>';
                }
            });
    });
});
</script>

@endsection