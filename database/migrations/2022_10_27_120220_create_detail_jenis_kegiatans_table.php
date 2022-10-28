<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailJenisKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_jenis_kegiatans', function (Blueprint $table) {
            $table->integer('id_detail_jenis_kegiatan', true)->autoIncrement();
            $table->integer('id_jenis_kegiatan') ; // this is working
            $table->foreign('id_jenis_kegiatan')->references('id_jenis_kegiatan')->on('jenis_kegiatans')->onDelete('cascade');
            $table->integer('point');
            $table->enum('status', ['y', 't']);
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_jenis_kegiatans');
    }
}
