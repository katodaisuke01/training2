<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasuredProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measured_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('measuring_log_id')->unsigned()->comment('計量受入ログID');
            $table->foreign('measuring_log_id')->references('id')->on('measuring_logs');
            $table->string('weight')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measured_products');
    }
}
