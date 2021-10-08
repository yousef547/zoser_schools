<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_issues', function (Blueprint $table) {
            $table->id();
            $table->string('issue_id',250);
            $table->text('user_id');
            $table->integer('book_id')->length(250);
            $table->string('serial_num',250);
            $table->integer('issue_date')->length(250);
            $table->integer('ret_date')->length(250);
            $table->boolean('is_returned')->default(0);
            $table->text('issue_notes');
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
        Schema::dropIfExists('library_issues');
    }
}
