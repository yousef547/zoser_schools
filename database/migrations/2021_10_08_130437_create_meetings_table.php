<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('conference_title',250);
            $table->text('conference_desc')->nullable();
            $table->integer('scheduled_date')->length(250);
            $table->integer('scheduled_time_start_total')->length(250);
            $table->integer('scheduled_time_end_total')->length(250);
            $table->integer('conference_duration')->length(250);
            $table->integer('created_by')->length(250);
            $table->longText('conference_host');
            $table->string('conference_target_type',250);
            $table->text('conference_target_details');
            $table->string('meeting_id',250);
            $table->longText('meeting_metadata');
            $table->boolean('conference_status')->default(0);
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
        Schema::dropIfExists('meetings');
    }
}
