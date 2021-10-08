<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_allocations', function (Blueprint $table) {
            $table->id();
            $table->string('feeTitle',255);
            $table->integer('feeGroup')->length(250);
            $table->integer('feeType')->length(250);
            $table->integer('feeTypeNextTS')->length(250);
            $table->string('feeFor',255);
            $table->text('feeForInfo');
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
        Schema::dropIfExists('fee_allocations');
    }
}
