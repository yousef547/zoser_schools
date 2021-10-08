<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookName',255);
            $table->text('bookDescription');
            $table->text('bookISBN');
            $table->string('bookAuthor',255);
            $table->string('bookPublisher',255);
            $table->string('bookType',255);
            $table->string('bookPrice',255)->nullable();
            $table->string('bookFile',255)->nullable();
            $table->boolean('bookState')->nullable()->default(true);
            $table->integer('bookQuantity');
            $table->text('bookShelf');
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
        Schema::dropIfExists('books');
    }
}
