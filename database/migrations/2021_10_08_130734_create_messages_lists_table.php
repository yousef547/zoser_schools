<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->length(250);
            $table->integer('toId')->length(250);
            $table->string('lastMessage', 250);
            $table->string('lastMessageDate', 250);
            $table->boolean('messageStatus');
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
        Schema::dropIfExists('messages_lists');
    }
}
