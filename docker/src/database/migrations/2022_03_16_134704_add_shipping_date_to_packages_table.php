<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingDateToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->date('shipping_date')->nullable()->comment('商品発送予定日')->after('user_id');
            $table->time('shipping_schedule_time')->nullable()->comment('配送予定時間')->after('shipping_date');
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
            $table->dropColumn('shipping_date');
            $table->dropColumn('shipping_schedule_time');
        });
    }
}
