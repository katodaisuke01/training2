<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_alerts', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unsigned()->comment('注文ID');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->boolean('package_damaged')->default(false)->comment('商品パッケージの損傷');
            $table->boolean('undelivered')->default(false)->comment('商品の未着');
            $table->boolean('damaged')->default(false)->comment('商品そのものの損傷');
            $table->boolean('different')->default(false)->comment('商品が違う');
            $table->boolean('incorrect_delivery')->default(false)->comment('商品の誤配送');
            $table->boolean('shipping_defects')->default(false)->comment('配送上の不備');
            $table->boolean('other')->default(false)->comment('その他');
            $table->softDeletes();
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
        Schema::dropIfExists('order_alerts');
    }
}
