<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalTotalQuantityToOrderBusinessGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_business_groups', function (Blueprint $table) {
            $table->integer('additional_total_count')->default(0)->after('total_quantity')->comment('作業画面追加注文分');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_business_groups', function (Blueprint $table) {
            $table->dropColumn('additional_total_count');
        });
    }
}
