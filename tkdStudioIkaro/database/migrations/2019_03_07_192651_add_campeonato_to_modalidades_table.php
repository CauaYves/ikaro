<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampeonatoToModalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modalidades', function (Blueprint $table) {
          $table->integer('campeonato_id')->unsigned();
          $table->foreign('campeonato_id')->references('id')->on('campeonatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modalidades', function (Blueprint $table) {
            //
        });
    }
}
