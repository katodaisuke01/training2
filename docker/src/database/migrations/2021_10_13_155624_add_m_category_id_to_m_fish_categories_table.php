<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMCategoryIdToMFishCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_fish_categories', function (Blueprint $table) {
            $table->integer('m_category_id')->unsigned()->nullable($value = true)->after('name')->comment('カテゴリID');
            $table->foreign('m_category_id')->references('id')->on('m_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_fish_categories', function (Blueprint $table) {
            $table->dropColumn('m_category_id');
        });
    }
}
