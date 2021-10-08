<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentscollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paymentscollections', function (Blueprint $table) {
            $table->id();
            $table->integer('invoiceId');
            $table->float('collectionAmount');
            $table->integer('collectionDate');
            $table->string('collectionMethod',250);
            $table->text('collectionNote');
            $table->integer('collectedBy')->length(250);
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
        Schema::dropIfExists('paymentscollections');
    }
}
