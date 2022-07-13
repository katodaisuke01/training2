<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNaturalTypeToIndustryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industry_groups', function (Blueprint $table) {
            $table->smallInteger('natural_type')
                ->default(0)
                ->after('scheduled_default_time')
                ->comment('天然・養殖（0: 天然,1:養殖）');
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
            $table->dropColumn('natural_type');
        });
    }
}
