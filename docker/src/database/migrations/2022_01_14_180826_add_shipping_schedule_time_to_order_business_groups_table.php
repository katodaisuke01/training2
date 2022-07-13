<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShippingScheduleTimeToOrderBusinessGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_business_groups', function (Blueprint $table) {
            $table->integer('shipping_status')->nullable()->default(0)->comment('出荷ステータス{1:出荷済}');
            $table->time('shipping_schedule_time')->nullable()->comment('出荷予定時刻');
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
            $table->dropColumn('shipping_status');
            $table->dropColumn('shipping_schedule_time');
        });
    }
}
