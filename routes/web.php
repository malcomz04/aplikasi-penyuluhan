<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelompokTaniController;
use App\Http\Controllers\beritaController;

Route::get('/', 'adminController@depan')->name('depan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/berita-depan/{uuid}', [beritaController::class, 'showDepan'])->name('beritaShowDepan');

Route::group(['middleware' => ['admin']], function () {
    Route::get('/admin/index', 'adminController@index')->name('adminIndex');

//User Route
    Route::get('/user/index', 'userController@index')->name('userIndex');
    Route::post('/user/index', 'userController@store')->name('userStore');
    Route::get('/user/edit/{uuid}', 'userController@edit')->name('userEdit');
    Route::put('/user/edit/{uuid}', 'userController@update')->name('userUpdate');
    Route::get('/user/delete/{uuid}', 'userController@destroy')->name('userDestroy');

//Kecamatan Route
    Route::get('/kecamatan/index', 'kecamatanController@index')->name('kecamatanIndex');
    Route::post('/kecamatan/index', 'kecamatanController@store')->name('kecamatanStore');
    Route::get('/kecamatan/edit/{uuid}', 'kecamatanController@edit')->name('kecamatanEdit');
    Route::put('/kecamatan/edit/{uuid}', 'kecamatanController@update')->name('kecamatanUpdate');
    Route::get('/kecamatan/delete/{uuid}', 'kecamatanController@destroy')->name('kecamatanDestroy');

////evaluasi Route
    Route::get('/evaluasi/index', 'evaluasiController@index')->name('evaluasiIndex');
    Route::post('/evaluasi/index', 'evaluasiController@store')->name('evaluasiStore');
    Route::get('/evaluasi/edit/{uuid}', 'evaluasiController@edit')->name('evaluasiEdit');
    Route::put('/evaluasi/edit/{uuid}', 'evaluasiController@update')->name('evaluasiUpdate');
    Route::get('/evaluasi/delete/{uuid}', 'evaluasiController@destroy')->name('evaluasiDestroy');

////pelatihan Route
    Route::get('/pelatihan/index', 'pelatihanController@index')->name('pelatihanIndex');
    Route::post('/pelatihan/index', 'pelatihanController@store')->name('pelatihanStore');
    Route::get('/pelatihan/detail/{uuid}', 'pelatihanController@show')->name('pelatihanShow');
    Route::post('/pelatihan/detail/addModul', 'pelatihanController@addModul')->name('pelatihanAddModul');
    Route::get('/pelatihan/edit/{uuid}', 'pelatihanController@edit')->name('pelatihanEdit');
    Route::put('/pelatihan/edit/{uuid}', 'pelatihanController@update')->name('pelatihanUpdate');
    Route::get('/pelatihan/delete/{uuid}', 'pelatihanController@destroy')->name('pelatihanDestroy');
    Route::get('/pelatihan/detail/deleteModul/{uuid}', 'pelatihanController@destroyModul')->name('modulPelatihanDestroy');

////modul Route
    Route::get('/modul/index', 'modulController@index')->name('modulIndex');
    Route::post('/modul/index', 'modulController@store')->name('modulStore');
    Route::get('/modul/preview/{uuid}', 'modulController@preview')->name('modulPreview');
    Route::get('/modul/edit/{uuid}', 'modulController@edit')->name('modulEdit');
    Route::put('/modul/edit/{uuid}', 'modulController@update')->name('modulUpdate');
    Route::get('/modul/delete/{uuid}', 'modulController@destroy')->name('modulDestroy');

////Berita Route
    Route::get('/berita/index', 'beritaController@index')->name('beritaIndex');
    Route::post('/berita/index', 'beritaController@store')->name('beritaStore');
    Route::get('/berita/detail/{uuid}', 'beritaController@show')->name('beritaShow');
    Route::get('/berita/edit/{uuid}', 'beritaController@edit')->name('beritaEdit');
    Route::put('/berita/edit/{uuid}', 'beritaController@update')->name('beritaUpdate');
    Route::get('/berita/delete/{uuid}', 'beritaController@destroy')->name('beritaDestroy');

////Berita Route
    Route::get('/tanaman/index', 'tanamanController@index')->name('tanamanIndex');
    Route::post('/tanaman/index', 'tanamanController@store')->name('tanamanStore');
    Route::get('/tanaman/detail/{uuid}', 'tanamanController@show')->name('tanamanShow');
    Route::get('/tanaman/edit/{uuid}', 'tanamanController@edit')->name('tanamanEdit');
    Route::put('/tanaman/edit/{uuid}', 'tanamanController@update')->name('tanamanUpdate');
    Route::get('/tanaman/delete/{uuid}', 'tanamanController@destroy')->name('tanamanDestroy');

////Berita Route
    Route::get('/lahan/index', 'lahanController@index')->name('lahanIndex');
    Route::post('/lahan/index', 'lahanController@store')->name('lahanStore');
    Route::get('/lahan/detail/{uuid}', 'lahanController@show')->name('lahanShow');
    Route::get('/lahan/edit/{uuid}', 'lahanController@edit')->name('lahanEdit');
    Route::put('/lahan/edit/{uuid}', 'lahanController@update')->name('lahanUpdate');
    Route::get('/lahan/delete/{uuid}', 'lahanController@destroy')->name('lahanDestroy');
    Route::get('/lahan/filter/{uuid}', 'lahanController@filter')->name('lahanFilter');


////Berita Route
    Route::get('/penanaman/index', 'penanamanController@index')->name('penanamanIndex');
    Route::post('/penanaman/index', 'penanamanController@store')->name('penanamanStore');
    Route::get('/penanaman/detail/{uuid}', 'penanamanController@show')->name('penanamanShow');
    Route::get('/penanaman/edit/{uuid}', 'penanamanController@edit')->name('penanamanEdit');
    Route::put('/penanaman/edit/{uuid}', 'penanamanController@update')->name('penanamanUpdate');
    Route::get('/penanaman/delete/{uuid}', 'penanamanController@destroy')->name('penanamanDestroy');

////Berita Route
    Route::get('/bahan/index', 'bahanController@index')->name('bahanIndex');
    Route::post('/bahan/index', 'bahanController@store')->name('bahanStore');
    Route::get('/bahan/edit/{uuid}', 'bahanController@edit')->name('bahanEdit');
    Route::put('/bahan/edit/{uuid}', 'bahanController@update')->name('bahanUpdate');
    Route::get('/bahan/delete/{uuid}', 'bahanController@destroy')->name('bahanDestroy');

////Berita Route
    Route::get('/pembelianBahan/index', 'pembelianBahanController@index')->name('pembelianBahanIndex');
    Route::post('/pembelianBahan/index', 'pembelianBahanController@store')->name('pembelianBahanStore');
    Route::get('/pembelianBahan/edit/{uuid}', 'pembelianBahanController@edit')->name('pembelianBahanEdit');
    Route::put('/pembelianBahan/edit/{uuid}', 'pembelianBahanController@update')->name('pembelianBahanUpdate');
    Route::get('/pembelianBahan/delete/{uuid}', 'pembelianBahanController@destroy')->name('pembelianBahanDestroy');

////Panen Route
    Route::get('/panen/index', 'panenController@index')->name('panenIndex');
    Route::post('/panen/index', 'panenController@store')->name('panenStore');
    Route::get('/panen/edit/{uuid}', 'panenController@edit')->name('panenEdit');
    Route::put('/panen/edit/{uuid}', 'panenController@update')->name('panenUpdate');
    Route::get('/panen/delete/{uuid}', 'panenController@destroy')->name('panenDestroy');
    Route::get('/panen/filter', 'panenController@filter')->name('panenFilter');


////Panen Route
Route::get('/mahasiswa/index', 'mahasiswaController@index')->name('mahasiswaIndex');
Route::post('/mahasiswa/index', 'mahasiswaController@store')->name('mahasiswaStore');
Route::get('/mahasiswa/edit/{id}', 'mahasiswaController@edit')->name('mahasiswaEdit');
Route::put('/mahasiswa/edit/{id}', 'mahasiswaController@update')->name('mahasiswaUpdate');
Route::get('/mahasiswa/delete/{id}', 'mahasiswaController@destroy')->name('mahasiswaDestroy');
Route::get('/mahasiswa/cetak', 'mahasiswaController@cetak')->name('mahasiswaCetak');

////Panen Route
    Route::get('/peserta/index', 'pesertaController@index')->name('pesertaIndex');
    Route::post('/peserta/index', 'pesertaController@store')->name('pesertaStore');
    Route::get('/peserta/edit/{uuid}', 'pesertaController@edit')->name('pesertaEdit');
    Route::put('/peserta/edit/{uuid}', 'pesertaController@update')->name('pesertaUpdate');
    Route::get('/peserta/delete/{uuid}', 'pesertaController@destroy')->name('pesertaDestroy');
    Route::get('/peserta/filter', 'pesertaController@filter')->name('pesertaFilter');

////Panen Route
    Route::get('/penjualan/index', 'penjualanController@index')->name('penjualanIndex');
    Route::post('/penjualan/index', 'penjualanController@store')->name('penjualanStore');
    Route::get('/penjualan/edit/{uuid}/', 'penjualanController@edit')->name('penjualanEdit');
    Route::put('/penjualan/edit/{uuid}', 'penjualanController@update')->name('penjualanUpdate');
    Route::get('/penjualan/delete/{uuid}', 'penjualanController@destroy')->name('penjualanDestroy');
    Route::get('/penjualan/filter', 'penjualanController@filter')->name('penjualanFilter');


////Berita Route
    Route::post('rincian/penanaman/index', 'rincianPenanamanController@store')->name('rincianPenanamanStore');
    Route::get('rincian/penanaman/edit/{uuid}', 'rincianPenanamanController@edit')->name('rincianPenanamanEdit');
    Route::put('rincian/penanaman/edit/{uuid}', 'rincianPenanamanController@update')->name('rincianPenanamanUpdate');
    Route::get('rincian/penanaman/delete/{uuid}', 'rincianPenanamanController@destroy')->name('rincianPenanamanDestroy');

////Cetak Report
    Route::get('/kecamatan/cetak', 'reportController@kecamatanCetak')->name('kecamatanCetak');
    Route::get('/evaluasi/cetak', 'reportController@evaluasiCetak')->name('evaluasiCetak');
    Route::get('/pelatihan/cetak', 'reportController@pelatihanCetak')->name('pelatihanCetak');
    Route::get('/pelatihan/detail/cetak/{uuid}', 'reportController@detailPelatihanCetak')->name('detailPelatihanCetak');
    Route::get('/modul/cetak', 'reportController@modulCetak')->name('modulCetak');
    Route::get('/bahan/cetak', 'reportController@bahanCetak')->name('bahanCetak');
    Route::get('/pembelian/cetak', 'reportController@pembelianCetak')->name('pembelianCetak');
    Route::get('/lahan/cetak', 'reportController@lahanCetak')->name('lahanCetak');
    Route::get('/penanaman/cetak/{uuid}', 'reportController@penanamanCetak')->name('penanamanCetak');
    Route::get('/penanaman/rincian/cetak/{uuid}', 'reportController@rincianPenanamanCetak')->name('rincianPenanamanCetak');
    Route::get('/tanaman/cetak', 'reportController@tanamanCetak')->name('tanamanCetak');
    Route::get('/panen/cetak', 'reportController@panenCetak')->name('panenCetak');
    Route::get('/penjualan/cetak', 'reportController@penjualanCetak')->name('penjualanCetak');
    Route::get('/peserta/cetak', 'reportController@pesertaCetak')->name('pesertaCetak');
    Route::post('/peserta/filter', 'reportController@pesertaFilter')->name('pesertaFilterCetak');
    Route::post('/panen/filter', 'reportController@panenFilter')->name('panenFilterCetak');
    Route::post('/penjualan/filter', 'reportController@penjualanFilter')->name('penjualanFilterCetak');
    Route::post('/lahan/filter/{uuid}', 'reportController@penanamanFilter')->name('lahanFilter');


});

Route::group(['middleware' => ['kecamatan']], function () {
    Route::get('/user/dashboard/index', 'adminController@userIndex')->name('userDashboardIndex');
    Route::get('/pelatihan/peserta/{uuid}', 'pelatihanController@tambahPeserta')->name('tambahPeserta');
    Route::post('/pelatihan/peserta/create', 'pelatihanController@tambahPesertaStore')->name('tambahPesertaStore');
    Route::get('/pelatihan/peserta/edit/{uuid}', 'pelatihanController@pesertaEdit')->name('pesertaKecamatanEdit');
    Route::put('/pelatihan/peserta/edit/{uuid}', 'pelatihanController@pesertaUpdate')->name('pesertaKecamatanUpdate');
    Route::get('/pelatihan/peserta/delete/{uuid}', 'pelatihanController@pesertaDestroy')->name('pesertaKecamatanDestroy');
    Route::get('/kecamatan/profil', 'kecamatanController@profil')->name('kecamatanProfil');

});
Route::get('/mahasiswa/index', 'mahasiswaController@index')->name('mahasiswaIndex');
    Route::post('/mahasiswa/index', 'mahasiswaController@store')->name('mahasiswaStore');
    Route::get('/mahasiswa/edit/{id}', 'mahasiswaController@edit')->name('mahasiswaEdit');
    Route::put('/mahasiswa/edit/{id}', 'mahasiswaController@update')->name('mahasiswaUpdate');
    Route::get('/mahasiswa/delete/{id}', 'mahasiswaController@destroy')->name('mahasiswaDestroy');

  // Kelompok Tani routes (CRUD, laporan, print, PDF)
Route::get('kelompok_tani/laporan', [KelompokTaniController::class, 'laporan'])->name('kelompok_tani.laporan');
Route::get('kelompok_tani/download-pdf', [KelompokTaniController::class, 'downloadPdf'])->name('kelompok_tani.downloadPdf');
Route::get('kelompok_tani/print', [KelompokTaniController::class, 'print'])->name('kelompok_tani.print');

// Resource tanpa show agar tidak bentrok
Route::resource('kelompok_tani', KelompokTaniController::class)->except(['show']);