<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyCheckinHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_checkin_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('m_business_id')->unsigned();
            $table->foreign('m_business_id')->references('id')->on('m_businesses');
            $table->date('checkin_date')->nullable()->comment('チェックイン日');
            $table->string('image_path')->nullable()->comment('画像path');
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
        Schema::dropIfExists('daily_checkin_histories');
    }
}
