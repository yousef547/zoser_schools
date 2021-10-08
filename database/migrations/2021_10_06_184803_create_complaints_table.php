<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('comp_title',255);
            $table->text('comp_desc');
            $table->integer('comp_type');
            $table->integer('comp_source');
            $table->string('FullName',255);
            $table->string('phoneNo',255);
            $table->string('email',255);
            $table->string('Address',255);
            $table->string('enq_date',255);
            $table->string('nxt_fup',255);
            $table->string('enq_file',255);
            $table->text('enq_notes');
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
        Schema::dropIfExists('complaints');
    }
}
