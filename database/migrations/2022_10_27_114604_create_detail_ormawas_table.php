<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailOrmawasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_ormawas', function (Blueprint $table) {
            $table->integer('id_detail_ormawa', true)->autoIncrement();
            $table->string('nama_ormawa', 45);
            $table->integer('id_prodi') ; // this is working
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade');
            $table->integer('id_ormawa') ; // this is working
            $table->foreign('id_ormawa')->references('id_ormawa')->on('ormawas')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_ormawas');
    }
}
