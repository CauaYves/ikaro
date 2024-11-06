<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosturmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horariosturmas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->string('diaSemana');
            $table->string('horarioEntrada');
            $table->string('horarioSaida');
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
        Schema::dropIfExists('horariosturmas');
    }
}
