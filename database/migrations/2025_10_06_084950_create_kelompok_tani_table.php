<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokTaniTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_tani', function (Blueprint $table) {
            $table->id();
            
            // Kolom Data Petani
            $table->string('kecamatan', 255); // Panjang string 255 karakter
            $table->string('no_kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telepon', 25)->nullable(); // Tambahan baru: NO_TELEPON Varchar 20
            
            // Kolom Terkait Lahan & Tanaman
            $table->float('luas_lahan'); // LUAS_LAHAN Float
            $table->string('jenis_lahan', 25)->nullable(); // Tambahan baru: JENIS_LAHAN Varchar 20
            $table->string('komoditas_tanam', 25); // KOMODITAS_TANAM Varchar 20 (menggantikan 'komoditas' saja)
            $table->date('periode_tanam')->nullable(); // Tambahan baru: PERIODE TANAM Date
            $table->string('kebutuhan_pupuk', 25)->nullable(); // KEBUTUHAN PUPUK Varchar 20 (menggantikan 'kebutuhan_definitif')
            
            // Kolom default Laravel
            $table->timestamps();
            
            // Kolom yang dihapus dari skema sebelumnya: rata_hasil_panen dan kebutuhan_definitif.
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok_tani');
    }
}