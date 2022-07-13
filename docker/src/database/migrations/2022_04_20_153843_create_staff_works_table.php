<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_works', function (Blueprint $table) {
            $table->id();
            $table->integer('wuser_id')->unsigned()->comment('ユーザーID');
            $table->foreign('wuser_id')->references('id')->on('wusers');
            $table->integer('task_id')->comment('タスクID');
            $table->integer('package_id')->unsigned()->nullable()->comment('パッケージID');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->integer('order_id')->unsigned()->nullable()->comment('注文ID');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('amount')->nullable()->comment('尾数');
            $table->integer('client_package_id')->unsigned()->nullable()->comment('顧客パッケージID');
            $table->integer('completed_flg')->comment('完了フラグ');
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
        Schema::dropIfExists('staff_works');
    }
}