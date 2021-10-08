<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('id_cards', function (Blueprint $table) {
            $table->id();
            $table->string('card_name',250);
            $table->text('header_text');
            $table->text('main_left');
            $table->text('main_right');
            $table->text('footer_text');
            $table->string('card_image',250);
            $table->text('position_margins');
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
        Schema::dropIfExists('id_cards');
    }
}
