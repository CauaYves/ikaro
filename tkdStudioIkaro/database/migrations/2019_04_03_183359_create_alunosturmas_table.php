<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosturmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunosturmas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turmas');
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->enum('bloqueado', ['sim', 'não'])->default('não');
            $table->text('motivoBloqueio')->nullable();
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
        Schema::dropIfExists('alunosturmas');
    }
}
