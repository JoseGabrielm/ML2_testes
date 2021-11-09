<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbmedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbmedida', function (Blueprint $table) {
            $table->string('item_id', 15)->primary();
            $table->string('descricao', 250);
            $table->double('largura');
            $table->double('altura');
            $table->double('profundidade');
            $table->double('peso');
            $table->string('entrega', 15);
            $table->string('classe', 10);
            $table->string('sku', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbmedida');
    }
}
