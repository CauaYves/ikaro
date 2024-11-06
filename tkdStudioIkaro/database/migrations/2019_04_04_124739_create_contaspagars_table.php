<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaspagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contaspagars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fornecedor');
            $table->decimal('parcela', 8, 2);
            $table->integer('qnd_parcela');
            $table->date('vencimento');
            $table->enum('status', ['0', '1'])->default('0');
            $table->string('aleatorio');
            $table->string('formaPagamento');
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
        Schema::dropIfExists('contaspagars');
    }
}
