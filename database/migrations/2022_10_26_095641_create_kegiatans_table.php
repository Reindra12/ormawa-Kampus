<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->integer('id_kegiatan', true)->autoIncrement();
            $table->string('nama_kegiatan');
            $table->string('diskripsi_kegiatan', 10000);
            $table->string('gambar_kegiatan');
            $table->date('tgl_kegiatan');
            $table->timeTz('jam_kegiatan');
            $table->integer('id_ormawa');
            $table->foreign('id_ormawa')->references('id_ormawa')->on('ormawas');
            $table->integer('id_jenis_kegiatan');
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
        Schema::dropIfExists('kegiatans');
    }
}
