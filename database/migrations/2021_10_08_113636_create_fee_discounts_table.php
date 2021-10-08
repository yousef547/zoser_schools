<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_discounts', function (Blueprint $table) {
            $table->id();
            $table->string('discount_name',255);
            $table->string('dicount_description',255);
            $table->string('discount_code',255);
            $table->string('discount_type',255);
            $table->string('discount_value',255);
            $table->boolean('discount_status');
            $table->longText('discount_assignment');
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
        Schema::dropIfExists('fee_discounts');
    }
}
