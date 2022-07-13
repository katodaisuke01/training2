<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepts', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->integer('package_id')->unsigned()->nullable($value = true)->comment('箱ID');
            $table->foreign('wuser_id')->references('id')->on('wusers');
            $table->integer('wuser_id')->unsigned()->nullable($value = true)->comment('作業者ID');
            $table->datetime('accept_date')->nullable()->comment('荷受け日時');
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
        Schema::dropIfExists('accepts');
    }
}
