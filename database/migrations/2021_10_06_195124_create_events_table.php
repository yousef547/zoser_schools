<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('eventTitle',255);
            $table->longText('eventDescription')->nullable();
            $table->string('eventFor',10)->nullable();
            $table->string('enentPlace',255)->nullable();
            $table->text('eventImage');
            $table->boolean('fe_active');
            $table->string('eventDate',255);

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
        Schema::dropIfExists('events');
    }
}
