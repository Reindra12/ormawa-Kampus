<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->integer('id_pelanggan', true)->autoIncrement();
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan', 10000);
            $table->integer('nomor_meteran');
            $table->integer('telp')->nullable();
            $table->string('qrcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggans');
    }
}
