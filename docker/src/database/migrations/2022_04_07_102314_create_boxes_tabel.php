<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('industry_group_id')->unsigned()->nullable($value = true)->comment('事業グループID');
            $table->foreign('industry_group_id')->references('id')->on('industry_groups');
            $table->string('box_name')->comment('箱の名称');
            $table->integer('width')->comment('横幅(cm)');
            $table->integer('height')->comment('高さ(cm)');
            $table->integer('depth')->comment('奥行き(cm)');
            $table->integer('limit_capacity')->comment('限界積載量(kg)');
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
        Schema::dropIfExists('boxes');
    }
}
