<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMudanzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mudanza', function (Blueprint $table) {
            $table->integer('estimacion_id');
            $table->integer('contained_id');
            $table->string('contained_type');
            $table->integer('cantidad');
            $table->integer('room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mudanza');
    }
}
