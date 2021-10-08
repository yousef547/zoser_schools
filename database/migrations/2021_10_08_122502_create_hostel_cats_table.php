<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_cats', function (Blueprint $table) {
            $table->id();
            $table->integer('catTypeId')->length(250);
            $table->string('catTitle',255);
            $table->integer('catFees')->length(250);
            $table->text('catNotes');
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
        Schema::dropIfExists('hostel_cats');
    }
}
