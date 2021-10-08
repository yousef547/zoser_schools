<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobnotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobnotifications', function (Blueprint $table) {
            $table->id();
            $table->text('notifTo');
            $table->text('notifToIds');
            $table->text('notifData');
            $table->integer('notifDate')->length(250);
            $table->string('notifSender',250);
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
        Schema::dropIfExists('mobnotifications');
    }
}
