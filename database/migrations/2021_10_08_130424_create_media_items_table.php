<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_items', function (Blueprint $table) {
            $table->id();
            $table->integer('albumId')->length(250)->default(0);
            $table->boolean('mediaType');
            $table->string('mediaURL',250);
            $table->string('mediaURLThumb',250)->nullable();
            $table->string('mediaTitle',250);
            $table->text('mediaDescription',250);
            $table->integer('mediaDate')->length(250);
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
        Schema::dropIfExists('media_items');
    }
}
