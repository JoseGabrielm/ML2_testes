<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbperguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbpergunta', function (Blueprint $table) {
            $table->string('id', 15)->primary();
            $table->string('item_id', 15)->index('fk_tbpergunta_tbmedida_idx');
            $table->string('text');
            $table->string('status', 12);
            $table->string('cep', 12);
            $table->integer('quant');
            $table->string('cidade', 50)->nullable();
            $table->text('resposta');
            $table->string('forma1', 9)->nullable();
            $table->double('valor1')->nullable();
            $table->integer('prazo1')->nullable();
            $table->string('domicilio1')->nullable();
            $table->string('forma2', 9)->nullable();
            $table->double('valor2')->nullable();
            $table->integer('prazo2')->nullable();
            $table->string('domicilio2')->nullable();
            $table->double('valor3')->nullable();
            $table->integer('prazo3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbpergunta');
    }
}
