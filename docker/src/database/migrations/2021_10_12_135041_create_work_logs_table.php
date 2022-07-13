<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_simultaneous_order_code')->nullable($value = true)->comment('同時注文ID');
            $table->integer('user_id')->unsigned()->nullable($value = true)->comment('作業ユーザーID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->dateTime('start_at')->nullable($value = true)->comment('作業開始時間');
            $table->dateTime('end_at')->nullable($value = true)->comment('作業終了時間');
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
        Schema::dropIfExists('work_logs');
    }
}
