<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDescontoalunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descontoalunos', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('aluno_id');
          $table->foreign('aluno_id')->references('id')->on('alunos');
          $table->unsignedInteger('atividade_id');
          $table->foreign('atividade_id')->references('id')->on('atividades');
          $table->decimal('valor', 8, 2);
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
        Schema::dropIfExists('descontoalunos');
    }
}
