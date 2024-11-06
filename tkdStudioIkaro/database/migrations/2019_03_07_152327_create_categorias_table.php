<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artemarcial_id')->unsigned();
            $table->foreign('artemarcial_id')->references('id')->on('artemarcials');
            $table->string('nome');
            $table->enum('sexo', ['masculino', 'feminino']);
            $table->decimal('menorPeso', 8, 2);
            $table->decimal('maiorPeso', 8, 2);
            $table->integer('graduacaoMenor');
            $table->integer('graduacaoMaior');
            $table->integer('idadeMenor');
            $table->integer('idadeMaior');
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
        Schema::dropIfExists('categorias');
    }
}
