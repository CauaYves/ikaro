<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampeonatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('artemarcial_id');
            $table->foreign('artemarcial_id')->references('id')->on('artemarcials');
            $table->string('nome');
            $table->date('diaCampeonato');
            $table->enum('statusCampeonato', ['aberto', 'fechado'])->default('aberto');
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
        Schema::dropIfExists('campeonatos');
    }
}
