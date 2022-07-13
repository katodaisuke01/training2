<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id')->comment('商品ID');
            $table->integer('m_category_id')->unsigned()->nullable($value = true)->comment('カテゴリID');
            $table->foreign('m_category_id')->references('id')->on('m_categories');
            $table->integer('m_fish_category_id')->unsigned()->nullable($value = true)->comment('魚種ID');
            $table->foreign('m_fish_category_id')->references('id')->on('m_fish_categories');
            $table->integer('m_business_id')->unsigned()->nullable($value = true)->comment('事業者ID');
            $table->foreign('m_business_id')->references('id')->on('m_businesses');
            $table->integer('m_process_id')->unsigned()->nullable($value = true)->comment('加工・締め工程ID');
            $table->foreign('m_process_id')->references('id')->on('m_processes');
            $table->integer('m_unit_id')->unsigned()->nullable($value = true)->comment('単位ID');
            $table->foreign('m_unit_id')->references('id')->on('m_units');
            $table->string('title')->length(100)->comment('商品名称');
            $table->longText('article')->nullable()->comment('メモ');
            $table->string('max_quantity')->nullable()->comment('最大個数');
            $table->string('base_weight')->nullable()->comment('基準重量');
            $table->string('tolerance')->nullable()->comment('計量許容値');
            $table->smallInteger('dealing_type')->nullable()->comment('複数まとめて処理（0:しない, 1:する）');
            $table->smallInteger('natural_type')->nullable()->comment('天然・養殖（0: 天然,1:養殖）');
            $table->smallInteger('status')->length(6)->nullable($value = true)->comment('ステータス（1:下書き,2:公開）');
            $table->dateTime('deleted_at')->nullable()->comment('商品情報削除日');
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
        Schema::dropIfExists('order_products');
    }
}
