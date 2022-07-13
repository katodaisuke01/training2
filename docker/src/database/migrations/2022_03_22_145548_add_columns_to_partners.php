<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('industry_groups', function (Blueprint $table) {
            $this->upColumns($table);
        });

        Schema::table('m_businesses', function (Blueprint $table) {
            $this->upColumns($table);
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
            $this->downColumns($table);
        });

        Schema::table('m_businesses', function (Blueprint $table) {
            $this->downColumns($table);
        });
    }

    private function upColumns(Blueprint $table)
    {
        $table->string('responsible_last_name')->after('name')->comment('担当者名字');
        $table->string('responsible_first_name')->after('responsible_last_name')->comment('担当者名前');
        $table->string('bank_name')->after('image_path')->comment('取引銀行');
        $table->string('bank_branch')->after('bank_name')->comment('支店名');
        $table->integer('bank_account_type')->default(1)->after('bank_branch')->comment('口座種別');
        $table->integer('bank_account_number')->nullable()->after('bank_account_type')->comment('口座番号');
        $table->string('bank_account_holder')->nullable()->after('bank_account_number')->comment('口座名義');
    }

    private function downColumns(Blueprint $table)
    {
        $table->dropColumn('responsible_last_name');
        $table->dropColumn('responsible_first_name');
        $table->dropColumn('bank_name');
        $table->dropColumn('bank_branch');
        $table->dropColumn('bank_account_type');
        $table->dropColumn('bank_account_number');
        $table->dropColumn('bank_account_holder');
    }
}
