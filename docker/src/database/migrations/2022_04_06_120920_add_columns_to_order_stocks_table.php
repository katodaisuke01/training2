<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrderStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_stocks', function (Blueprint $table) {
            $table->integer('order_product_id')->unsigned()->nullable($value = true)->after('stock_id')->comment('商品ID');
            $table->foreign('order_product_id')->references('id')->on('order_products');
            $table->string('image_path')->nullable()->after('order_product_id');
            $table->string('weight')->nullable()->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_stocks', function (Blueprint $table) {
            $table->dropColumn('order_product_id');
            $table->dropColumn('image_path');
            $table->dropColumn('weight');
        });
    }
}
