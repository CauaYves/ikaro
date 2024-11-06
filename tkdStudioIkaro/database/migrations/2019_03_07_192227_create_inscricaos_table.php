<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('atleta_id');
            $table->foreign('atleta_id')->references('id')->on('atletas');
            $table->unsignedInteger('modalidade_id');
            $table->foreign('modalidade_id')->references('id')->on('modalidades');
            $table->unsignedInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedInteger('campeonato_id');
            $table->foreign('campeonato_id')->references('id')->on('campeonatos');
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
        Schema::dropIfExists('inscricaos');
    }
}
