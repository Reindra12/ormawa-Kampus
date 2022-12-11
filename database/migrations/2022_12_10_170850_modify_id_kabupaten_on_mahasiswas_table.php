<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyIdKabupatenOnMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('mahasiswas', function (Blueprint $table) {

            // $table->dropForeign('id_kabupaten');
            // $table->dropForeign('id_desa');


            $table->string('id_kabupaten')->default(1)->unsigned()->change();
            $table->string('id_desa')->default(1)->unsigned()->change();
        });
        Schema::enableForeignKeyConstraints();
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
