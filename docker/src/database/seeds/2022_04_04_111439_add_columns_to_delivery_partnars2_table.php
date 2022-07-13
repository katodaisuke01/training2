<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToDeliveryPartnars2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_partnars', function (Blueprint $table) {
            $table->string('manager_last_name')->nullable()->comment('担当者：姓')->after('email');
            $table->string('manager_first_name')->nullable()->comment('担当者：名')->after('manager_last_name');
            $table->integer('delivery_category')->nullable()->comment('運送区分')->after('manager_first_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_partnars', function (Blueprint $table) {
          $table->dropColumn('manager_last_name');
          $table->dropColumn('manager_first_name');
          $table->dropColumn('delivery_category');
        });
    }
}
