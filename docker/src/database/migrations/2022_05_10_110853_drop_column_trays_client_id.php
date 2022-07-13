<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnTraysClientId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trays', function (Blueprint $table) {
            $table->dropForeign('trays_client_id_foreign');
            $table->dropColumn('client_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trays', function (Blueprint $table) {
            $table->integer('client_id')->unsigned()->comment('顧客ID');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }
}
