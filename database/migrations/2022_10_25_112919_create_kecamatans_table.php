<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
           $table->integer('id_kecamatan')->autoIncrement();
           $table->string('nama_kecamatan');
           $table->integer('id_kabupaten');
           $table->foreign('id_kabupaten')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
           $table->enum('status',['y','t']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatans');
    }
}
