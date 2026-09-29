<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('pelatihan_id');
            $table->string('no_spt', 50);
            $table->date('tgl_spt');
            $table->string('nama_peserta', 100);
            $table->string('NIK', 30);
            $table->tinyInteger('jk');
            $table->string('tempat_lahir', 50);
            $table->text('alamat');
            $table->date('tgl_lahir');
            $table->tinyInteger('status');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            $table->foreign('pelatihan_id')->references('id')->on('pelatihans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
}
