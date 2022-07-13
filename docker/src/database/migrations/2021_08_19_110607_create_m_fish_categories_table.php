<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMFishCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_fish_categories', function (Blueprint $table) {
            $table->increments('id')->comment('魚種ID');
            $table->string('name')->comment('名称');
            $table->dateTime('deleted_at')->nullable()->comment('項目削除日');
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
        Schema::dropIfExists('m_fish_categories');
    }
}
