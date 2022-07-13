<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_businesses', function (Blueprint $table) {
            $table->string('fax')->nullable()->comment('FAX')->after('tel');
            $table->string('image_path')->nullable()->after('address3');
            $table->string('delivery_zipcode')->nullable()->after('image_path')->comment('配送場所');
            $table->string('delivery_address1')->nullable()->after('delivery_zipcode');
            $table->string('delivery_address2')->nullable()->after('delivery_address1');
            $table->string('delivery_address3')->nullable()->after('delivery_address2');
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
            $table->dropColumns('fax');
            $table->dropColumns('image_path');
            $table->dropColumns('delivery_zipcode');
            $table->dropColumns('delivery_address1');
            $table->dropColumns('delivery_address2');
            $table->dropColumns('delivery_address3');
        });
    }
}
