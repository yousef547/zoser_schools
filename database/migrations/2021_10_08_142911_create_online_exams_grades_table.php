<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineExamsGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_exams_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('examId');
            $table->integer('studentId');
            $table->text('examQuestionsAnswers');
            $table->integer('examGrade')->nullable();
            $table->string('examDate',250);
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
        Schema::dropIfExists('online_exams_grades');
    }
}
