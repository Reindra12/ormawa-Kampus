<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('id_mahasiswa')->autoIncrement();
            $table->string('nim', 11);
            $table->string('nama', 45);
            $table->enum('jenkel', ['l', 'p']);
            $table->integer('id_kabupaten') ; 
            $table->foreign('id_kabupaten')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
            $table->date('tgl_lahir');
            $table->string('alamat', 45);
            $table->integer('id_desa') ; 
            $table->foreign('id_desa')->references('id_desa')->on('desas')->onDelete('cascade');
            $table->integer('telp');
            $table->integer('id_prodi') ; 
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade');
            $table->year('tahun_masuk');
            $table->enum('ospek', ['y','t']);
            $table->year('tahun_ospek');
            $table->string('user', 250);
            $table->string('password', 250);
            $table->enum('status', ['y','t']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
