<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropServiceIdAndPasswordFromDeliveryPartnarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_partnars', function (Blueprint $table) {
            $table->dropColumn('service_id');
            $table->dropColumn('password');
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
            $table->string('service_id')->unique()->nullable()->comment('ログインID')->after('id');
            $table->string('password')->after('email');
        });
    }
}
