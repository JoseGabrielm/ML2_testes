<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTbperguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbpergunta', function (Blueprint $table) {
            $table->foreign('item_id', 'fk_tbpergunta_tbmedida')->references('item_id')->on('tbmedida')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbpergunta', function (Blueprint $table) {
            $table->dropForeign('fk_tbpergunta_tbmedida');
        });
    }
}
