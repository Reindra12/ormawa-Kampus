<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->integer('id_absen', true)->autoIncrement();
            $table->enum('status', ['H', 'T']);
            $table->integer('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->integer('id_kegiatan');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
        });

        // Schema::rename('absen_models', 'absens');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absens');
    }
}
