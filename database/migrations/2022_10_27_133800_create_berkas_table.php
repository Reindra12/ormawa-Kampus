<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->integer('id_berkas')->autoIncrement();
            $table->string('nama_kabupaten');
            $table->integer('id_detail_kegiatan');
            $table->foreign('id_detail_kegiatan')->references('id_detail_kegiatan')->on('detail_kegiatans')->onDelete('cascade');
            $table->enum('verifikasi',['m','t','s']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berkas');
    }
}
