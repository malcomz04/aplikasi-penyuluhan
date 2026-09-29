<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Kelompok Tani</title>
    <style>
    /* Mengatur halaman ke A4 Landscape (tergantung pada library PDF generator yang digunakan, misalnya DomPDF/Snappy) */
    @page {
        size: A4 landscape;
        margin: 20px;
        /* Margin lebih kecil (sekitar 0.7 inci) */
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 10px;
        /* Font sangat kecil untuk kerapatan */
        margin: 0;
        padding: 0;
        color: #000;
    }

    h1 {
        text-align: center;
        text-transform: uppercase;
        font-size: 16px;
        margin-bottom: 3px;
    }

    h2 {
        text-align: center;
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-size: 10px;
        /* Pastikan ukuran font tabel 10px */
    }

    th,
    td {
        border: 1px solid #444;
        padding: 3px;
        /* Padding minimal untuk kerapatan */
        vertical-align: top;
        line-height: 1.1;
        /* Mengurangi jarak baris */
    }

    th {
        background-color: #f0f0f0;
        text-align: center;
        font-weight: bold;
    }

    .meta-info {
        text-align: right;
        margin-top: 5px;
        font-size: 9px;
    }

    .nik-kk {
        font-size: 9px;
        /* Ukuran font khusus untuk NIK/KK */
    }

    /* Kelas khusus untuk mengatur lebar kolom */
    .w-3 {
        width: 3%;
    }

    .w-7 {
        width: 7%;
    }

    .w-9 {
        width: 9%;
    }

    .w-10 {
        width: 10%;
    }

    .w-18 {
        width: 18%;
    }

    .w-4 {
        width: 4%;
    }
    </style>
</head>

<body>

    @php
    // Logika penentuan apakah pengguna adalah Admin yang mencetak SEMUA data
    $isAdminPrintingAll = (strpos($namaKecamatan, 'Semua Kecamatan') !== false);

    // Total kolom: 11 (User) atau 12 (Admin)
    $colSpan = $isAdminPrintingAll ? 12 : 11;

    // Mendapatkan tanggal cetak
    try {
    // Jika menggunakan Carbon, format dengan bahasa Indonesia
    $tanggalCetak = \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY, HH:mm:ss');
    } catch (\Exception $e) {
    // Fallback jika Carbon tidak tersedia atau error
    $tanggalCetak = date('d/m/Y H:i:s');
    }
    @endphp

    <h1>LAPORAN DATA KELOMPOK TANI</h1>
    <h2>
        @if ($isAdminPrintingAll)
        Filter Saat Ini:
        @if(strpos($namaKecamatan, 'Semua') !== false)
        Semua Kelompok Tani
        @else
        {{ $namaKecamatan }}
        @endif
        @else
        Kelompok Tani: **{{ $namaKecamatan }}**
        @endif
    </h2>

    <table>
        <thead>
            <tr>
                <th class="w-3">No.</th>

                {{-- Kolom Kelompok Tani hanya tampil jika Admin mencetak SEMUA data --}}
                @if ($isAdminPrintingAll)
                <th class="w-7">Kelompok Tani</th>
                @endif

                <th class="w-9">NIK / No. KK</th>
                <th class="w-10">Nama</th>
                <th class="w-7">No. Telp</th>
                <th class="w-18">Alamat</th>
                <th class="w-4">Luas (Ha)</th>
                <th class="w-7">Jenis Lahan</th>
                <th class="w-9">Komoditas Tanam</th>
                <th class="w-8">Periode Tanam</th>
                <th class="w-8">Kebutuhan Pupuk (Kg)</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($kelompokTani as $data)
            <tr>
                <td style="text-align:center;">{{ $no++ }}</td>

                {{-- Data kelompok tani (menggunakan data->kecamatan) hanya tampil jika Admin mencetak SEMUA data --}}
                @if ($isAdminPrintingAll)
                <td>{{ $data->kecamatan }}</td>
                @endif

                <td class="nik-kk">
                    <strong>KK:</strong> {{ $data->no_kk }}<br>
                    <strong>NIK:</strong> {{ $data->nik }}
                </td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_telepon ?? '-' }}</td>
                <td>{{ $data->alamat }}</td>
                <td style="text-align:center;">{{ number_format($data->luas_lahan, 2) }}</td>
                <td>{{ $data->jenis_lahan ?? '-' }}</td>
                <td>{{ $data->komoditas_tanam }}</td>
                <td style="text-align:center;">
                    {{ $data->periode_tanam ? \Carbon\Carbon::parse($data->periode_tanam)->format('d/m/Y') : '-' }}
                </td>
                <td style="text-align:center;">{{ number_format($data->kebutuhan_pupuk, 0) ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="{{ $colSpan }}" style="text-align:center; padding: 10px;">Tidak ada data anggota kelompok
                    tani.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="meta-info">
        Dicetak melalui Sistem pada: {{ $tanggalCetak }}
    </div>
</body>

</html>