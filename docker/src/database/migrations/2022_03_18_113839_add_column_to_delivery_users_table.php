<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDeliveryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('delivery_users', function (Blueprint $table) {
            $table->string('tel')->nullable()->after('first_name_kana')->comment('電話番号');
            $table->string('vehicle_number')->nullable()->after('tel')->comment('車両番号');
            $table->string('image_path')->nullable()->after('vehicle_number')->comment('画像path');
            $table->dateTime('date_last')->nullable()->after('image_path')->comment('最終ログイン日');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_users', function (Blueprint $table) {
            $table->dropColumn('tel');
            $table->dropColumn('vehicle_number');
            $table->dropColumn('image_path');
            $table->dropColumn('date_last');
        });
    }
}
