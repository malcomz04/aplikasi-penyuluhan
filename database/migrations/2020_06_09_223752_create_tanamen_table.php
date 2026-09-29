<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanamen', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->string('kode_tanaman', 50);
            $table->string('nama_tanaman', 50);
            $table->string('stok', 50);
            $table->string('satuan', 50);
            $table->string('harga', 50);
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
        Schema::dropIfExists('tanamen');
    }
}
