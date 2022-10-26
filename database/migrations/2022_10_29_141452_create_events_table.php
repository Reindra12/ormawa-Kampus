<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id_event', true)->autoIncrement();
            $table->string('name');
            $table->string('desc');
            $table->string('image');
            $table->date('date', $precision = 0);
            $table->timeTz('time', $precision = 0);
            $table->bigInteger('category_id')->unsigned()->index(); // this is working
            $table->foreign('category_id')->references('id_category')->on('categories')->onDelete('cascade');
            //restrict = agar id yg sudah terisi tidak boleh di hapus
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
