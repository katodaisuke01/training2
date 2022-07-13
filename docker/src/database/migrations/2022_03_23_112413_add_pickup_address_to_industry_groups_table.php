<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPickupAddressToIndustryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industry_groups', function (Blueprint $table) {
            $table->string('pickup_prefecture')->nullable()->after('bank_account_holder')->comment('集荷都道府県ID');
            $table->string('pickup_prefecture_name')->nullable()->after('pickup_prefecture')->comment('集荷都道府県名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('industry_groups', function (Blueprint $table) {
            $table->dropColumn('pickup_prefecture');
            $table->dropColumn('pickup_prefecture_name');
        });
    }
}
