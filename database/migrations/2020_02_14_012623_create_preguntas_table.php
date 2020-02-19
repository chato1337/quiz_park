<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('examen_id')->unsigned();
            $table->text('pregunta');
            $table->string('a_opt');
            $table->string('b_opt');
            $table->string('c_opt');
            $table->string('d_opt');
            $table->string('respuesta');
            $table->timestamps();

            $table->foreign('examen_id')->references('id')->on('examenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
