<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTransportColumnsToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->integer('package_height')->nullable()->comment('高さ')->after('saved_type');
            $table->integer('package_width')->nullable()->comment('幅')->after('package_height');
            $table->integer('package_depth')->nullable()->comment('奥行き')->after('package_width');
            $table->string('temporary_weight')->nullable()->comment('仮重量')->after('package_depth');
            $table->string('loading_weight')->nullable()->comment('積載時重量')->after('temporary_weight');
            $table->integer('logistic_cost')->nullable()->comment('物流費')->after('loading_weight');
            $table->tinyInteger('transport_space')->default(0)->comment('貨物スペース(0:未確保 1:確保済)')->after('logistic_cost');
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
            $table->dropColumn('package_height');
            $table->dropColumn('package_width');
            $table->dropColumn('package_depth');
            $table->dropColumn('temporary_weight');
            $table->dropColumn('loading_weight');
            $table->dropColumn('logistic_cost');
            $table->dropColumn('transport_space');
        });
    }
}
