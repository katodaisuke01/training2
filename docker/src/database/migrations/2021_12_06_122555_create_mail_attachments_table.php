<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_business_group_id')->unsigned()->nullable($value = true)->comment('グループID');
            $table->foreign('order_business_group_id')->references('id')->on('order_business_groups');
            $table->string('file_path')->comment('アップロードファイルパス');
            $table->string('file_name')->comment('アップロードファイルのオリジナルファイル名');
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
        Schema::dropIfExists('mail_attachments');
    }
}
