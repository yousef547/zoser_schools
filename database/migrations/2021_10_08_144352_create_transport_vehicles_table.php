<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transport_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number',250);
            $table->string('vehicle_color',250);
            $table->string('vehicle_model',250);
            $table->string('driver_name',250);
            $table->string('driver_photo',250);
            $table->string('driver_license',250);
            $table->text('driver_contact',250);
            $table->text('vehicle_notes',250);
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
        Schema::dropIfExists('transport_vehicles');
    }
}
