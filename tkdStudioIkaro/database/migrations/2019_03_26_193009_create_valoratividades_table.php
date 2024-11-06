<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoratividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoratividades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('atividade_id');
            $table->foreign('atividade_id')->references('id')->on('atividades');
            $table->decimal('valor', 8, 2);
            $table->integer('ano');
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
        Schema::dropIfExists('valoratividades');
    }
}
