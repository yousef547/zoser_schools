<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phone_calls', function (Blueprint $table) {
            $table->id();
            $table->string('FullName',250);
            $table->string('phoneNo',250);
            $table->string('email',250);
            $table->string('call_type',250);
            $table->string('purpose',250);
            $table->string('call_time',250);
            $table->string('nxt_follow',250);
            $table->string('call_duration',250);
            $table->text('call_details');
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
        Schema::dropIfExists('phone_calls');
    }
}
