<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('nascimento');
            $table->enum('sexo', ['masculino', 'feminino']);
            $table->decimal('peso', 8, 2);
            $table->string('imagem')->nullable();
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('ibge')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();

            $table->unsignedInteger('artemarcial_id');
            $table->foreign('artemarcial_id')->references('id')->on('artemarcials');
            $table->unsignedInteger('graduacao_id');
            $table->foreign('graduacao_id')->references('id')->on('graduacaos');
            $table->unsignedInteger('academia_id');
            $table->foreign('academia_id')->references('id')->on('academias');
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
        Schema::dropIfExists('atletas');
    }
}
