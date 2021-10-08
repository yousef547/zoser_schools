<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('pass_id',250);
            $table->string('fullName',250);
            $table->string('phoneNo',250);
            $table->string('email',250);
            $table->string('id_pass_id',250);
            $table->integer('no_pers')->length(250)->default(1);
            $table->string('usr_type',250);
            $table->text('student');
            $table->string('std_relation',250);
            $table->string('comp_name',250);
            $table->text('to_meet');
            $table->text('purpose');
            $table->text('check_in');
            $table->text('check_out');
            $table->string('docs',250);
            $table->text('visit_notes');

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
        Schema::dropIfExists('visitors');
    }
}
