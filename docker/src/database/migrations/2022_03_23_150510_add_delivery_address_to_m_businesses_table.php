<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryAddressToMBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_businesses', function (Blueprint $table) {
            $table->string('delivery_prefecture')->nullable()->after('bank_account_holder')->comment('配送都道府県ID');
            $table->string('delivery_prefecture_name')->nullable()->after('delivery_prefecture')->comment('配送都道府県名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_businesses', function (Blueprint $table) {
            $table->dropColumn('delivery_prefecture');
            $table->dropColumn('delivery_prefecture_name');
        });
    }
}
