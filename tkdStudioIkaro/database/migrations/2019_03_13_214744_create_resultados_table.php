<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campeonato_id')->unsigned();
            $table->foreign('campeonato_id')->references('id')->on('campeonatos');
            $table->integer('inscricao_id')->unsigned();
            $table->foreign('inscricao_id')->references('id')->on('inscricaos');
            $table->enum('classificacao', ['1', '2', '3', '4', '5']);
            $table->enum('tipoConfronto', ['luta', 'WO', 'poomsae']);
            $table->integer('pontuacao');
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
        Schema::dropIfExists('resultados');
    }
}
