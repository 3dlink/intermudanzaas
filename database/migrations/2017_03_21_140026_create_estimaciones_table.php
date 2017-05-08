<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente');
            $table->string('digito');
            $table->string('fecha_estimada');
            $table->integer('tipo_mudanza');
            $table->string('comentario', 1000);
            $table->string('telf_origen');
            $table->string('telf_destino');
            $table->integer('p_origen');
            $table->integer('p_destino');
            $table->string('c_destino');
            $table->string('c_origen');
            $table->string('dir_origen');
            $table->string('dir_destino');
            $table->integer('estado');
            $table->date('fecha_ult_accion');
            $table->date('fecha_respuesta');
            $table->double('mtrs3');
            $table->double('valor_total');
            $table->integer('a_cargo');
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
        Schema::drop('estimaciones');
    }
}
