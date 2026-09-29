<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Kelompok Tani (Cetak Ringkas)</title>
    <!-- Menggunakan CDN Tailwind untuk tampilan di browser lebih modern -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    /* CSS Khusus untuk tampilan cetak */
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            margin: 0;
            padding: 0;
            /* Mengatur ukuran kertas menjadi A4 landscape */
            size: a4 landscape;
        }

        /* Kurangi padding/jarak tabel saat dicetak agar lebih ringkas */
        th,
        td {
            padding: 3px !important;
            /* Disesuaikan agar sangat ringkas */
            line-height: 1.1;
            /* Mengurangi jarak antar baris */
        }

        /* Hapus bayangan dan latar belakang container saat dicetak */
        .container {
            box-shadow: none !important;
            margin-top: 0 !important;
            padding: 0 !important;
        }
    }

    /* Styling umum */
    body {
        font-family: ui-sans-serif, system-ui, sans-serif;
        /* Ukuran container disesuaikan untuk mode print/landscape */
        padding: 0.5in;
        /* Padding di luar container utama */
    }

    /* Gaya default untuk mencegah masalah tampilan saat tidak dicetak */
    th,
    td {
        border: 1px solid #000;
        padding: 6px;
    }

    table {
        border-collapse: collapse;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
    <script>
    function printReport() {
        window.print();
    }
    </script>
</head>

<body class="bg-gray-50">
    @php
    // Logika penentuan apakah pengguna adalah Admin yang mencetak SEMUA data
    $isAdminPrintingAll = (strpos($namaKecamatan, 'Semua Kecamatan') !== false);

    // Total kolom: 11 (User) atau 12 (Admin)
    $colSpan = $isAdminPrintingAll ? 12 : 11;

    // Logika penentu nama pencetak (PERUBAHAN UTAMA DI SINI)
    $printedBy = 'User Tidak Teridentifikasi';

    // 1. Prioritas: Cek apakah peran yang dikirimkan adalah 'admin'
    if (isset($userRole) && strtolower($userRole) === 'admin') {
    $printedBy = 'Admin';
    // 2. Jika bukan admin, gunakan nama user yang sedang login
    } elseif (isset($userName) && $userName) {
    $printedBy = $userName;
    // 3. Fallback ke nama Kelompok Tani jika nama user tidak tersedia
    } else {
    $printedBy = $namaKecamatan;
    }
    @endphp

    <div class="container bg-white shadow-xl rounded-lg mt-8 p-0">

        <!-- Tombol Cetak (Akan disembunyikan saat mencetak) -->
        <div class="no-print mb-6 flex justify-end">
            <button onclick="printReport()"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                Cetak Laporan
            </button>
        </div>

        <h1 class="text-xl font-bold text-center mb-1">LAPORAN DATA KELOMPOK TANI</h1>
        <h2 class="text-base font-medium text-center mb-3">
            @if ($isAdminPrintingAll)
            Filter Saat Ini: Semua Kelompok Tani
            @else
            Kelompok Tani: {{ $namaKecamatan }}
            @endif
        </h2>

        <table class="w-full text-[10px] sm:text-xs">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-[3%] text-center">No.</th>

                    {{-- Kolom Kelompok Tani hanya tampil jika Admin mencetak SEMUA data --}}
                    @if ($isAdminPrintingAll)
                    <th class="w-[7%] text-center">Kelompok Tani</th>
                    @endif

                    <th class="w-[9%] text-center">NIK / No. KK</th>
                    <th class="w-[10%]">Nama</th>
                    <th class="w-[7%]">No. Telp</th>
                    <th class="w-[18%]">Alamat</th>
                    <th class="w-[4%] text-center">Luas (Ha)</th>
                    <th class="w-[7%] text-center">Jenis Lahan</th>
                    <th class="w-[9%]">Komoditas Tanam</th>
                    <th class="w-[8%] text-center">Periode Tanam</th>
                    <th class="w-[8%]">Kebutuhan Pupuk (Kg)</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @forelse ($kelompokTani as $data)
                <tr>
                    <td class="text-center">{{ $no++ }}</td>

                    {{-- Data kelompok tani (menggantikan kecamatan) hanya tampil jika Admin mencetak SEMUA data --}}
                    @if ($isAdminPrintingAll)
                    <td>{{ $data->kecamatan }}</td>
                    {{-- Menggunakan data->kecamatan (backend) namun labelnya 'Kelompok Tani' --}}
                    @endif

                    <td class="text-left leading-snug">
                        <span class="font-semibold">KK:</span> {{ $data->no_kk }}<br>
                        <span class="font-semibold">NIK:</span> {{ $data->nik }}
                    </td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->no_telepon ?? '-' }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td class="text-center">{{ number_format($data->luas_lahan, 2) }}</td>
                    <td>{{ $data->jenis_lahan ?? '-' }}</td>
                    <td>{{ $data->komoditas_tanam }}</td>
                    <td class="text-center">
                        {{ $data->periode_tanam ? \Carbon\Carbon::parse($data->periode_tanam)->format('d/m/Y') : '-' }}
                    </td>
                    <td class="text-center">{{ number_format($data->kebutuhan_pupuk, 0) ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="{{ $colSpan }}" class="text-center py-4">Tidak ada data anggota kelompok tani.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Output 'Dicetak oleh' yang dinamis -->
        <div class="mt-4 text-right text-[10px] sm:text-xs">
            <p>Dicetak pada: {{ $tanggalCetak }}</p>
        </div>
    </div>
</body>

</html>