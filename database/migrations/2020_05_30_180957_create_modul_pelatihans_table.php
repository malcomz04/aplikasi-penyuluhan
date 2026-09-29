<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulPelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul_pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('pelatihan_id');
            $table->unsignedBigInteger('modul_id');
            $table->timestamps();
            $table->foreign('pelatihan_id')->references('id')->on('pelatihans')->onDelete('cascade');
            $table->foreign('modul_id')->references('id')->on('moduls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modul_pelatihans');
    }
}
