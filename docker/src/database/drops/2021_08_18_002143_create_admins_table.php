<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_id')->unique()->comment('ユーザーログインID');
            $table->string('email', 50)->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('last_name', 50)->nullable()->comment('姓');
            $table->string('first_name', 50)->nullable()->comment('名');
            $table->string('last_name_kana', 50)->nullable()->comment('セイ');
            $table->string('first_name_kana', 50)->nullable()->comment('メイ');
            $table->string('officer', 20)->nullable()->comment('役職');
            $table->string('type', 20)->nullable()->comment('ユーザー権限（normal, super）');
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
        Schema::dropIfExists('admins');
    }
}
