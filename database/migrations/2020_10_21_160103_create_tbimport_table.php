<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbimportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbimport', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pedido', 100);
            $table->string('usuario', 20);
            $table->integer('total_amount');
            $table->integer('paid_amount');
            $table->string('seller_sku', 10);
            $table->string('title', 190);
            $table->string('value_name', 190);
            $table->integer('quantity');
            $table->integer('unit_price');
            $table->integer('sale_fee');
            $table->string('shipping', 50);
            $table->string('buyerid', 190);
            $table->string('nickname', 100);
            $table->string('email', 150);
            $table->string('last_name', 50);
            $table->string('first_name', 100);
            $table->string('area_code', 6);
            $table->string('numberfone', 10);
            $table->string('area_code2', 6);
            $table->string('numberfone2', 10);
            $table->string('doc_type', 40);
            $table->string('doc_number', 60);
            $table->string('street_name', 150);
            $table->string('street_number', 20);
            $table->string('comment', 190);
            $table->string('zip_code', 10);
            $table->string('city', 60);
            $table->string('state', 20);
            $table->string('neighborhood', 190);
            $table->string('receiver_name', 100);
            $table->string('receiver_phone', 20);
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbimport');
    }
}
