<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_groups', function (Blueprint $table) {
            $table->increments('id')->comment('グループID');
            $table->string('group_name')->nullable($value = true)->comment('グループ名');
            $table->integer('client_id')->unsigned()->nullable($value = true)->comment('顧客ID');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('m_business_id')->unsigned()->nullable($value = true)->comment('事業者ID');
            $table->foreign('m_business_id')->references('id')->on('m_businesses');
            $table->integer('delivery_partnar_id')->unsigned()->nullable($value = true)->comment('配送業者');
            $table->foreign('delivery_partnar_id')->references('id')->on('delivery_partnars');
            $table->dateTime('shipping_date')->nullable()->comment('商品発送日');
            $table->string('total_quantity')->nullable()->comment('合計注文数');
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
        Schema::dropIfExists('order_groups');
    }
}
