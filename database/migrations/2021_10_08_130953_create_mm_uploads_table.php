<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMmUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mm_uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->length(250);
            $table->string('file_orig_name',250);
            $table->string('file_uploaded_name',250);
            $table->integer('file_size')->length(250);
            $table->string('file_mime',250);
            $table->integer('file_uploaded_time')->length(250);
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
        Schema::dropIfExists('mm_uploads');
    }
}
