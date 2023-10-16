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
            $table->string('nim', 11)->nullable();
            $table->string('nama', 45)->nullable();
            $table->enum('jenkel', ['l', 'p']);
            $table->integer('id_kabupaten')->nullable();
            $table->foreign('id_kabupaten')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
            $table->integer('id_kecamatan')->nullable();
            $table->foreign('id_kecamatan')->references('id_kecamatan')->on('kecamatans')->onDelete('cascade');
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat', 45)->nullable();
            $table->integer('id_desa')->nullable();
            $table->foreign('id_desa')->references('id_desa')->on('desas')->onDelete('cascade');
            $table->integer('telp')->nullable();
            $table->integer('id_prodi')->nullable();
            $table->foreign('id_prodi')->references('id_prodi')->on('prodis')->onDelete('cascade');
            $table->year('tahun_masuk')->nullable();
            $table->enum('ospek', ['y','t']);
            $table->year('tahun_ospek')->nullable();
            $table->string('user', 250)->nullable();
            $table->string('password', 250)->nullable();
            $table->rememberToken();
            $table->enum('status', ['y','t']);
            $table->string('fcm_token')->nullable();
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
