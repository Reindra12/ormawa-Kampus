<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->integer('id_absensi', true)->autoIncrement();
            $table->string('nama');
            $table->string('status');
            $table->binary('qrcode_image')->nullable();
            $table->integer('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->integer('id_kegiatan');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
            $table->integer('id_prodi');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
