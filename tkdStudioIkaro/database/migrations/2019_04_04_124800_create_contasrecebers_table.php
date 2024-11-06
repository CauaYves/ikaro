<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasrecebersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contasrecebers', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('parcela', 8, 2);
            $table->integer('qnd_parcela');
            $table->date('vencimento');
            //status da baixa...
            $table->enum('status', ['0', '1'])->default('0');
            $table->string('aleatorio');
            //dados externos da forma de pagamento
            $table->string('formaPagamento');
            //dados externos do cliente
            $table->unsignedInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->unsignedInteger('atividade_id');
            $table->foreign('atividade_id')->references('id')->on('atividades');
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
        Schema::dropIfExists('contasrecebers');
    }
}
