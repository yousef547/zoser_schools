<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_issues', function (Blueprint $table) {
            $table->id();
            $table->string('refno',250);
            $table->integer('item_cat')->length(250);
            $table->integer('item_title')->length(250);
            $table->integer('qty')->length(250);
            $table->text('issue_tu');
            $table->integer('issue_date')->length(250);
            $table->integer('ret_date')->length(250);
            $table->boolean('is_returned');
            $table->string('attachment',250);
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
        Schema::dropIfExists('inv_issues');
    }
}
