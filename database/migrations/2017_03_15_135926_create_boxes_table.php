<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('unit');
            $table->string('tooltip', 100);
            $table->string('description', 255);
            $table->integer('vmin');
            $table->integer('vmax');
            $table->double('factor', 8, 5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boxes');
    }
}
