<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailsms', function (Blueprint $table) {
            $table->id();
            $table->text('mailTo');
            $table->string('mailType',250);
            $table->longText('messageData');
            $table->string('messageDate',250);
            $table->string('messageSender',250);
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
        Schema::dropIfExists('mailsms');
    }
}
