<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kegiatans', function (Blueprint $table) {
            $table->integer('id_detail_kegiatan')->autoIncrement();
            $table->integer('id_kegiatan'); // this is working
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
            $table->integer('id_mahasiswa') ; // this is working
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswas');
            $table->integer('id_jenis_kegiatan') ; // this is working
            $table->foreign('id_jenis_kegiatan')->references('id_jenis_kegiatan')->on('jenis_kegiatans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kegiatans');
    }
}
