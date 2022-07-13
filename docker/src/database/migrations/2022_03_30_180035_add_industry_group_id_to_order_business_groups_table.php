<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndustryGroupIdToOrderBusinessGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_business_groups', function (Blueprint $table) {
            $table->integer('industry_group_id')->unsigned()->nullable()->after('delivery_partnar_id')->comment('産地ID');
            $table->foreign('industry_group_id')->references('id')->on('industry_groups');
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
            $table->dropForeign('order_business_groups_industry_group_id_foreign');
            $table->dropColumn('industry_group_id');
        });
    }
}
