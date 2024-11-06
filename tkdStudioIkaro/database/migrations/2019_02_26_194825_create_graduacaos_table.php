<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraduacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeGraduacao');
            $table->string('corpoFaixa');//cor;
            $table->string('pontaFaixa');//cor;
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
        Schema::dropIfExists('graduacaos');
    }
}
