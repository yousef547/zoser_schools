<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postals', function (Blueprint $table) {
            $table->id();
            $table->string('postal_type',250);
            $table->string('refno',250);
            $table->text('postal_from');
            $table->string('postal_to',250);
            $table->text('postal_desc');
            $table->string('postal_time',250);
            $table->string('attachment',250);

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
        Schema::dropIfExists('postals');
    }
}
