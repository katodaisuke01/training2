<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wusers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_id')->unique()->comment('ユーザーログインID');
            $table->string('email', 50)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('last_name', 50)->nullable()->comment('姓');
            $table->string('first_name', 50)->nullable()->comment('名');
            $table->string('last_name_kana', 50)->nullable()->comment('セイ');
            $table->string('first_name_kana', 50)->nullable()->comment('メイ');
            $table->integer('m_business_id')->unsigned()->comment('事業者ID');
            $table->string('officer', 20)->nullable()->comment('役職');
            $table->enum('type', ['NORMAL', 'MANAGER'])->default('NORMAL')->comment('NORMAL, MANAGER');
            $table->string('image_path')->nullable()->comment('画像path');
            $table->dateTime('deleted_at')->nullable()->comment('アカウント削除日');
            $table->timestamps();

            $table->foreign('m_business_id')->references('id')->on('m_businesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wusers');
    }
}
