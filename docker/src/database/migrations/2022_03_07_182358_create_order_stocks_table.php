<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_id')->unsigned()->nullable($value = true)->comment('在庫ID');
            $table->foreign('stock_id')->references('id')->on('stocks');
            $table->integer('order_id')->unsigned()->nullable($value = true)->comment('注文ID');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->tinyInteger('status')->default(1)->comment('在庫ステータス(0:在庫なし 1:在庫あり)');
            $table->dateTime('disposal_time')->nullable()->comment('廃棄日時');
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
        Schema::dropIfExists('order_stocks');
    }
}
