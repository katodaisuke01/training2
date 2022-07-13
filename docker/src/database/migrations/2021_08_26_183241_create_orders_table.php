<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->comment('注文ID');
            $table->integer('m_business_id')->unsigned()->nullable($value = true)->comment('事業者ID');
            $table->foreign('m_business_id')->references('id')->on('m_businesses');
            $table->integer('order_product_id')->unsigned()->nullable($value = true)->comment('商品ID');
            $table->foreign('order_product_id')->references('id')->on('order_products');
            $table->integer('client_id')->unsigned()->nullable($value = true)->comment('顧客ID');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('delivery_partnar_id')->unsigned()->nullable($value = true)->comment('顧客ID');
            $table->foreign('delivery_partnar_id')->references('id')->on('delivery_partnars');
            $table->string('quantity')->nullable()->comment('注文数');
            $table->dateTime('shipping_date')->nullable()->comment('商品発送日');
            $table->string('simultaneous_order_code')->nullable($value = true)->comment('同時発注コード');
            $table->smallInteger('shipping_status')->length(6)->nullable($value = true)->comment('発送ステータス（1:未発送,2:発送済み');
            $table->longText('article')->nullable()->comment('メモ');
            $table->integer('order_group_id')->unsigned()->nullable($value = true)->comment('グループID');
            $table->foreign('order_group_id')->references('id')->on('order_groups');
            $table->integer('order_business_group_id')->unsigned()->nullable($value = true)->comment('グループID');
            $table->foreign('order_business_group_id')->references('id')->on('order_business_groups');
            $table->dateTime('deleted_at')->nullable()->comment('キャンセル日');
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
        Schema::dropIfExists('orders');
    }
}
