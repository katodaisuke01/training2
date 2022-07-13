<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_product_id')->unsigned()->nullable($value = true)->comment('商品ID');
            $table->foreign('order_product_id')->references('id')->on('order_products');
            $table->date('landing_date')->nullable()->comment('水揚げ日');
            $table->integer('total_quantity')->nullable()->comment('数量');
            $table->integer('total_weight')->nullable()->comment('重量(g)');
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
        Schema::dropIfExists('stocks');
    }
}
