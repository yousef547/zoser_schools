<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mettings', function (Blueprint $table) {
            $table->id();
            $table->string('conference_title', 250);
            $table->text('conference_desc')->nullable();
            $table->text('target_users');
            $table->integer('scheduled_date')->length(250);
            $table->integer('scheduled_time_start_total')->length(250);
            $table->integer('scheduled_time_end_total')->length(250);
            $table->integer('conference_duration')->length(250);
            $table->integer('created_by')->length(250);
            $table->longText('conference_presenter');
            $table->longText('conference_moderators');
            $table->string('meeting_id', 250);
            $table->longText('meeting_metadata');
            $table->boolean('conference_status')->default(0);
            $table->integer('server_hook_id')->length(250);
            $table->integer('consumption_users')->length(250);
            $table->integer('consumption_minutes')->nullable()->length(250);
            $table->string('meeting_platform', 250);
            $table->integer('branchId')->length(250);
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
        Schema::dropIfExists('mettings');
    }
}
