<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeliveryPartnerIdToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('delivery_partnar_id')->unsigned()->nullable()->after('industry_group_id')->comment('配送事業者id');
            $table->foreign('delivery_partnar_id')->references('id')->on('delivery_partnars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropForeign('packages_delivery_partnar_id_foreign');
            $table->dropColumn('delivery_partnar_id');
        });
    }
}
