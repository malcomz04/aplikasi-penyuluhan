<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianBahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_bahans', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->string('kode_pembelian', 50);
            $table->foreignId('bahan_id')->onDelete('cascade');
            $table->string('jumlah', 50);
            $table->string('satuan', 50);
            $table->date('tanggal');
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
        Schema::dropIfExists('pembelian_bahans');
    }
}
