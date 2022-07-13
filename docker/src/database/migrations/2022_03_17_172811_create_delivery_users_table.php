<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_users', function (Blueprint $table) {
            $table->id();
            $table->string('service_id')->unique()->comment('ユーザーログインID');
            $table->string('email', 50)->unique()->comment('メールアドレス');
            $table->integer('delivery_partner_id')->unsigned();
            $table->foreign('delivery_partner_id')->references('id')->on('delivery_partnars');
            $table->string('password');
            $table->enum('type', ['NORMAL', 'MANAGER'])->default('NORMAL')->comment('NORMAL, MANAGER');
            $table->string('last_name', 50)->nullable()->comment('姓');
            $table->string('first_name', 50)->nullable()->comment('名');
            $table->string('last_name_kana', 50)->nullable()->comment('セイ');
            $table->string('first_name_kana', 50)->nullable()->comment('メイ');
            $table->dateTime('deleted_at')->nullable()->comment('アカウント削除日');
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
        Schema::dropIfExists('delivery_users');
    }
}
