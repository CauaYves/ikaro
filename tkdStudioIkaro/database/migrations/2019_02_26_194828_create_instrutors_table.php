<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrutors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('nascimento')->nullble();
            $table->enum('sexo', ['masculino', 'feminino'])->nullble();
            $table->string('imagem')->nullble();
            $table->string('rg')->nullble();
            $table->string('cpf')->nullble();
            $table->string('cep')->nullble();
            $table->string('rua')->nullble();
            $table->string('numero')->nullble();
            $table->string('complemento')->nullble();
            $table->string('bairro')->nullble();
            $table->string('cidade')->nullble();
            $table->string('uf')->nullble();
            $table->string('ibge')->nullble();
            $table->string('telefone')->nullble();
            $table->string('celular')->nullble();
            $table->string('email')->nullble();
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
        Schema::dropIfExists('instrutors');
    }
}
