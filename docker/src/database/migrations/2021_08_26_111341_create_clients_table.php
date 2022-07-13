<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id')->comment('顧客ID');
            $table->string('name')->comment('名称');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('email')->comment('メールアドレス');
            $table->string('zip_code')->nullable()->comment('郵便番号');
            $table->string('prefecture_name')->nullable()->comment('都道府県名');
            $table->string('address1')->nullable()->comment('市区町村');
            $table->string('address2')->nullable()->comment('番地');
            $table->string('address3')->nullable()->comment('建物名');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
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
        Schema::dropIfExists('clients');
    }
}
