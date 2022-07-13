<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->integer('landing_configuration')->nullable()->comment('水揚げ日設定')->after('tolerance');
            $table->integer('purification_configuration')->nullable()->comment('浄化日設定')->after('landing_configuration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropColumn('landing_configuration');
            $table->dropColumn('purification_configuration');
        });
    }
}
