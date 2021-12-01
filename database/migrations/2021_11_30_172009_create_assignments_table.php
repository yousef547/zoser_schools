<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->foreign('class_id')->constrained();
            $table->text('sectionid');
            $table->foreign('subject')->constrained();
            $table->foreign('user_id')->constrained();
            $table->string('AssignTitle');
            $table->text('AssignDescription');
            $table->string('AssignFile');
            $table->string('AssignDeadLine');
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
        Schema::dropIfExists('assignments');
    }
}
