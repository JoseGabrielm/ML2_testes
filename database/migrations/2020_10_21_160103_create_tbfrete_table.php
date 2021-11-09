<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbfreteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbfrete', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('regiao', 50);
            $table->integer('cepini');
            $table->integer('cepfim');
            $table->double('pesoini');
            $table->double('pesofim');
            $table->double('valor');
            $table->integer('prazo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbfrete');
    }
}
