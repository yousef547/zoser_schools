<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsboards', function (Blueprint $table) {
            $table->id();
            $table->string('newsTitle',250);
            $table->longText('newsText');
            $table->string('newsFor',250);
            $table->integer('newsDate')->length(250);
            $table->string('newsImage',250);
            $table->boolean('fe_active');
            $table->integer('creationDate')->length(250);
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
        Schema::dropIfExists('newsboards');
    }
}
