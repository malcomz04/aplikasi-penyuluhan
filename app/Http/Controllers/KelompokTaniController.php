<?php

namespace App\Http\Controllers;

use App\KelompokTani; // Model KelompokTani (Pastikan ini sesuai dengan nama model Anda)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PDF; // Pastikan package PDF seperti Barryvdh/Laravel-DomPDF sudah terinstal

/**
 * Class KelompokTaniController
 *
 * Mengelola data Kelompok Tani dengan hak akses berdasarkan role pengguna.
 * - Role 2 (Admin): Melihat semua, filter, dan cetak laporan. TIDAK boleh CREATE, EDIT, DELETE.
 * - Role Lainnya (User Kecamatan): Hanya boleh CRUD data yang terhubung dengan 'kecamatan' mereka.
 */
class KelompokTaniController extends Controller
{
    /**
     * Wajibkan autentikasi untuk semua method di controller ini.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Helper: Mengambil nama kecamatan dari objek user yang sedang login.
     * @return string|null Nama kecamatan dalam bentuk string tunggal, atau null.
     */
    private function getNamaKecamatanUser(): ?string
    {
        $user = Auth::user();
        $kecamatanValue = $user->kecamatan ?? null;

        if (empty($kecamatanValue)) {
            Log::warning('User ID ' . ($user->id ?? 'N/A') . ' tidak memiliki nilai kecamatan yang valid.');
            return null;
        }

        // Jika sudah berupa string (skenario ideal)
        if (is_string($kecamatanValue)) {
            return $kecamatanValue;
        }

        // Jika berupa objek atau array (fallback untuk skenario non-standar)
        if (is_object($kecamatanValue) || is_array($kecamatanValue)) {
            // Coba ambil dari key 'nama' atau 'kecamatan'
            if (isset($kecamatanValue['nama']) && is_string($kecamatanValue['nama'])) {
                return $kecamatanValue['nama'];
            }
            if (isset($kecamatanValue['kecamatan']) && is_string($kecamatanValue['kecamatan'])) {
                return $kecamatanValue['kecamatan'];
            }
        }

        Log::warning('Gagal mengekstrak nama kecamatan dari data user ID ' . ($user->id ?? 'N/A'));
        return null;
    }

    /**
     * Tampilkan daftar data kelompok tani (Index).
     * FIX UTAMA: Menggunakan ->paginate(10) untuk objek data yang dikirimkan.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
  public function index(Request $request)
{
    $query = KelompokTani::query();
    $kecamatanUser = $this->getNamaKecamatanUser();
    $is_admin = Auth::user()->role == 2;
    $currentFilter = '';

    // 1. Ambil daftar semua kecamatan untuk filter dropdown
    $daftarKecamatan = KelompokTani::select('kecamatan')
        ->whereNotNull('kecamatan')
        ->distinct()
        ->pluck('kecamatan')
        ->filter()
        ->values()
        ->toArray();

    // 2. Logika Filter Berdasarkan Role (Akses Dasar)
    if ($is_admin) {
        // ADMIN (Bisa filter semua data)
        if ($request->filled('kecamatan') && $request->kecamatan !== 'Semua Kecamatan') {
            $query->where('kecamatan', $request->kecamatan);
            $currentFilter = $request->kecamatan;
        } else {
            $currentFilter = 'Semua Kecamatan';
        }
    } else {
        // USER KECAMATAN (Hanya melihat data di kecamatannya)
        if (empty($kecamatanUser)) {
            return view('kelompok_tani.index', compact('daftarKecamatan'))
                ->with('kelompokTani', collect()->paginate(10))
                ->with('currentFilter', 'Tidak Ada Data Kecamatan Terhubung');
        }

        $query->where('kecamatan', $kecamatanUser)
              ->where('user_id', Auth::id());
        $currentFilter = $kecamatanUser;
    }

    // ================================================================
    // PENERAPAN ALGORITMA RULE-BASED FILTERING (EXACT MATCH)
    // ================================================================

    // Aturan 1: Pencarian Nama Kelompok (Exact Match)
    // Mencari data yang sama persis dengan input di kolom 'nama'
    if ($request->filled('search_nama')) {
        $query->where('nama', '=', $request->search_nama);
    }

    // Aturan 2: Pencarian Berdasarkan Kode/Atribut Unik (Exact Match)
    // Gunakan operator '=' untuk memastikan hasil pencarian akurat/presisi
    if ($request->filled('search_nik')) {
        $query->where('nik', '=', $request->search_nik);
    }

    // ================================================================

    // 3. Eksekusi Query, Sorting, dan PAGINATION
    $kelompokTani = $query->orderBy('kecamatan', 'asc')
                          ->orderBy('nama', 'asc')
                          ->paginate(10); // Tetap mempertahankan pagination 10 data

    return view('kelompok_tani.index', compact('kelompokTani', 'daftarKecamatan', 'currentFilter'));
}
    /**
     * Tampilkan form tambah data baru. HANYA untuk User Kecamatan.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        if (Auth::user()->role == 2) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Admin tidak diperbolehkan menambah data baru.');
        }

        $kecamatanUser = $this->getNamaKecamatanUser();

        if (empty($kecamatanUser)) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Anda belum terhubung dengan data kecamatan. Silahkan hubungi Administrator Sistem.');
        }

        return view('kelompok_tani.create', compact('kecamatanUser'));
    }

    /**
     * Simpan data kelompok tani yang baru. HANYA untuk User Kecamatan.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (Auth::user()->role == 2) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Admin tidak diperbolehkan menyimpan data.');
        }

        $kecamatanUser = $this->getNamaKecamatanUser();

        if (empty($kecamatanUser)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan. User belum terhubung ke data kecamatan. Silakan hubungi admin.');
        }

        $validatedData = $request->validate([
            'no_kk'                 => 'required|string|max:20|unique:kelompok_tani,no_kk',
            'nik'                   => 'required|string|max:20|unique:kelompok_tani,nik',
            'nama'                  => 'required|string|max:100',
            'alamat'                => 'required|string',
            'no_telepon'            => 'nullable|string|max:15',
            'luas_lahan'            => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/', // 2 desimal
            'jenis_lahan'           => 'required|string|max:50',
            'komoditas_tanam'       => 'required|string|max:100',
            'periode_tanam'         => 'required|string|max:50',
            'kebutuhan_pupuk'       => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['kecamatan'] = (string) $kecamatanUser;

        KelompokTani::create($validatedData);

        return redirect()->route('kelompok_tani.index')
            ->with('success', '✅ Data anggota kelompok tani berhasil disimpan. Kecamatan: ' . $kecamatanUser);
    }

    /**
     * Tampilkan form edit data. HANYA untuk User Kecamatan pemilik data.
     * @param int $id ID KelompokTani
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $kelompokTani = KelompokTani::findOrFail($id);

        if (Auth::user()->role == 2) {
             return redirect()->route('kelompok_tani.index')
                 ->with('error', '❌ Admin hanya memiliki izin untuk melihat dan mencetak laporan.');
        }

        if ($kelompokTani->user_id != Auth::id()) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Anda tidak memiliki izin untuk mengedit data ini karena bukan data yang Anda input.');
        }

        $kecamatanUser = $this->getNamaKecamatanUser();

        if (empty($kecamatanUser)) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Akses diblokir. Data kecamatan Anda tidak terdefinisi.');
        }

        return view('kelompok_tani.edit', compact('kelompokTani', 'kecamatanUser'));
    }

    /**
     * Proses update data. HANYA untuk User Kecamatan pemilik data.
     * @param \Illuminate\Http\Request $request
     * @param int $id ID KelompokTani
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $kelompokTani = KelompokTani::findOrFail($id);

        if (Auth::user()->role == 2) {
             return redirect()->route('kelompok_tani.index')
                 ->with('error', '❌ Admin tidak diizinkan memperbarui data.');
        }

        if ($kelompokTani->user_id != Auth::id()) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Anda tidak memiliki izin memperbarui data ini.');
        }

        $validatedData = $request->validate([
            'no_kk'                 => 'required|string|max:20|unique:kelompok_tani,no_kk,' . $id,
            'nik'                   => 'required|string|max:20|unique:kelompok_tani,nik,' . $id,
            'nama'                  => 'required|string|max:100',
            'alamat'                => 'required|string',
            'no_telepon'            => 'nullable|string|max:15',
            'luas_lahan'            => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'jenis_lahan'           => 'required|string|max:50',
            'komoditas_tanam'       => 'required|string|max:100',
            'periode_tanam'         => 'required|string|max:50',
            'kebutuhan_pupuk'       => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $kecamatanUser = $this->getNamaKecamatanUser();
        if (empty($kecamatanUser)) {
             return redirect()->back()->with('error', 'Gagal update. User belum terhubung ke data kecamatan.');
        }

        $validatedData['user_id'] = Auth::id();
        $validatedData['kecamatan'] = (string) $kecamatanUser;

        $kelompokTani->update($validatedData);

        return redirect()->route('kelompok_tani.index')
            ->with('success', '✅ Data anggota kelompok tani berhasil diperbarui.');
    }

    /**
     * Hapus data. HANYA untuk User Kecamatan pemilik data.
     * @param int $id ID KelompokTani
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $kelompokTani = KelompokTani::findOrFail($id);

        if (Auth::user()->role == 2) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Admin tidak diizinkan menghapus data.');
        }

        if ($kelompokTani->user_id != Auth::id()) {
            return redirect()->route('kelompok_tani.index')
                ->with('error', '❌ Anda tidak memiliki izin menghapus data ini karena bukan data yang Anda input.');
        }

        $kelompokTani->delete();

        return redirect()->route('kelompok_tani.index')
            ->with('success', '🗑️ Data berhasil dihapus: ' . $kelompokTani->nama);
    }

    /**
     * Download laporan data dalam format PDF.
     * PENTING: Menggunakan ->get() untuk mengambil SEMUA data laporan (bukan paginasi).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf(Request $request)
    {
        $query = KelompokTani::query();
        $kecamatanUser = $this->getNamaKecamatanUser();
        $namaKecamatan = 'Semua Kecamatan';
        $is_admin = Auth::user()->role == 2;

        if ($is_admin) {
            if ($request->filled('kecamatan') && $request->kecamatan !== 'Semua Kecamatan') {
                $query->where('kecamatan', $request->kecamatan);
                $namaKecamatan = $request->kecamatan;
            } else {
                $namaKecamatan = 'Semua Kecamatan (Admin)';
            }
        } else {
            if (empty($kecamatanUser)) {
                return redirect()->route('kelompok_tani.index')->with('error', 'Gagal membuat PDF. Data kecamatan user tidak ditemukan.');
            }

            $query->where('kecamatan', $kecamatanUser)
                  ->where('user_id', Auth::id());
            $namaKecamatan = $kecamatanUser;
        }

        $kelompokTani = $query->orderBy('kecamatan', 'asc')
                              ->orderBy('nama', 'asc')
                              // <-- MENGGUNAKAN get() UNTUK LAPORAN LENGKAP -->
                              ->get();

        if ($kelompokTani->isEmpty()) {
             return redirect()->route('kelompok_tani.index')->with('error', 'Tidak ada data Kelompok Tani yang tersedia untuk dicetak.');
        }

        $dataLaporan = [
            'kelompokTani' => $kelompokTani,
            'namaKecamatan' => $namaKecamatan,
            'tanggalCetak' => now()->format('d M Y H:i:s'),
        ];

        $pdf = PDF::loadView('kelompok_tani.laporan_pdf', $dataLaporan)
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-kelompok-tani-' . $namaKecamatan . '-' . now()->format('Ymd_His') . '.pdf');
    }

    /**
     * Halaman preview/print laporan.
     * PENTING: Menggunakan ->get() untuk mengambil SEMUA data laporan (bukan paginasi).
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function print(Request $request)
    {
        $query = KelompokTani::query();
        $kecamatanUser = $this->getNamaKecamatanUser();
        $namaKecamatan = 'Semua Kecamatan';
        $is_admin = Auth::user()->role == 2;

        if ($is_admin) {
            if ($request->filled('kecamatan') && $request->kecamatan !== 'Semua Kecamatan') {
                $query->where('kecamatan', $request->kecamatan);
                $namaKecamatan = $request->kecamatan;
            } else {
                 $namaKecamatan = 'Semua Kecamatan (Admin)';
            }
        } else {
            if (empty($kecamatanUser)) {
                return redirect()->route('kelompok_tani.index')->with('error', 'Gagal menampilkan print. Data kecamatan user tidak ditemukan.');
            }

            $query->where('kecamatan', $kecamatanUser)
                  ->where('user_id', Auth::id());
            $namaKecamatan = $kecamatanUser;
        }

        $kelompokTani = $query->orderBy('kecamatan', 'asc')
                              ->orderBy('nama', 'asc')
                              // <-- MENGGUNAKAN get() UNTUK LAPORAN LENGKAP -->
                              ->get();

        if ($kelompokTani->isEmpty()) {
             return redirect()->route('kelompok_tani.index')->with('error', 'Tidak ada data Kelompok Tani yang tersedia untuk dicetak.');
        }

        $dataLaporan = [
            'kelompokTani' => $kelompokTani,
            'namaKecamatan' => $namaKecamatan,
            'tanggalCetak' => now()->format('d M Y H:i:s'),
        ];

        return view('kelompok_tani.laporan_print', $dataLaporan);
    }
}
