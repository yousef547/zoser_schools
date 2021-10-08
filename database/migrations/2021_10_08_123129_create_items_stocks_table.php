<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('refno',250);
            $table->integer('cat_id')->length(250);
            $table->integer('item_id')->length(250);
            $table->integer('store_id')->length(250);
            $table->integer('supplier_id')->length(250);
            $table->string('qty',250);
            $table->string('stock_date',250);
            $table->string('stock_attach',250);
            $table->text('stock_notes');
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
        Schema::dropIfExists('items_stocks');
    }
}
