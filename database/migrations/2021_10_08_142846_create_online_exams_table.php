<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_exams', function (Blueprint $table) {
            $table->id();
            $table->string('examTitle',250);
            $table->text('examDescription')->nullable();
            $table->text('examClass');
            $table->text('sectionId');
            $table->integer('examTeacher')->length(250);
            $table->integer('examSubject')->length(250);
            $table->string('examDate',250);
            $table->integer('exAcYear')->length(250);
            $table->string('ExamEndDate',250);
            $table->integer('examTimeMinutes')->length(250)->default(0);
            $table->integer('examDegreeSuccess')->length(250);
            $table->boolean('ExamShowGrade')->default(0);
            $table->boolean('random_questions');
            $table->text('examQuestion');

            
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
        Schema::dropIfExists('online_exams');
    }
}
