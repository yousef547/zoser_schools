<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_codes', function (Blueprint $table) {
            $table->id();
            $table->string('item_title',250);
            $table->text('item_desc',250);
            $table->integer('item_cat')->length(250);
            $table->string('item_code',250);
            $table->string('item_pn',250);
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
        Schema::dropIfExists('items_codes');
    }
}
