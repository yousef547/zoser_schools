<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineExamsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_exams_questions', function (Blueprint $table) {
            $table->id();
            $table->longText('question_text');
            $table->string('question_type', 250);
            $table->text('question_answers',);
            $table->float('question_mark');
            $table->string('question_image', 250);
            $table->integer('question_subject');
            $table->integer('employee_id');
            $table->boolean('is_shared')->nullable();
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
        Schema::dropIfExists('online_exams_questions');
    }
}
