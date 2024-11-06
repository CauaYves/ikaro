<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            // $table->string('imagem');
            // $table->string('cep');
            // $table->string('rua');
            // $table->string('numero');
            // $table->string('complemento');
            // $table->string('bairro');
            // $table->string('cidade');
            // $table->string('uf');
            // $table->string('ibge');
            // $table->string('telefone');
            // $table->string('celular');
            // $table->string('email');
            // $table->string('site')->nullable();
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
        Schema::dropIfExists('academias');
    }
}
