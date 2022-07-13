<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToIndustryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industry_groups', function (Blueprint $table) {
            $table->string('fax')->nullable()->comment('FAX')->after('tel');
            $table->string('image_path')->nullable()->after('address3');
            $table->string('pickup_zipcode')->nullable()->after('image_path')->comment('集荷場所');
            $table->string('pickup_address1')->nullable()->after('pickup_zipcode');
            $table->string('pickup_address2')->nullable()->after('pickup_address1');
            $table->string('pickup_address3')->nullable()->after('pickup_address2');
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
            $table->dropColumns('fax');
            $table->dropColumns('image_path');
            $table->dropColumns('pickup_zipcode');
            $table->dropColumns('pickup_address1');
            $table->dropColumns('pickup_address2');
            $table->dropColumns('pickup_address3');
        });
    }
}
