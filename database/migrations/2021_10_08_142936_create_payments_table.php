<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('paymentTitle', 250);
            $table->text('paymentDescription')->nullable();
            $table->integer('paymentStudent')->length(250);
            $table->text('paymentRows');
            $table->float('paymentAmount');
            $table->float('paymentDiscount');
            $table->float('paymentDiscounted');
            $table->float('paidAmount')->default(0);
            $table->boolean('paymentStatus')->nullable();
            $table->integer('paymentDate')->length(250);
            $table->integer('dueDate')->length(250);
            $table->boolean('dueNotified')->default(0);
            $table->string('paymentUniqid', 250)->nullable();
            $table->text('paymentSuccessDetails')->nullable();
            $table->string('paidMethod', 250)->nullable();
            $table->integer('paidTime')->length(250)->nullable();
            $table->integer('discount_id')->length(250);
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
        Schema::dropIfExists('payments');
    }
}
