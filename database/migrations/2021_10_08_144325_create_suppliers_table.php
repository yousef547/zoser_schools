<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supp_name',250);
            $table->text('supp_desc');
            $table->string('supp_phone',250);
            $table->string('supp_mail',250);
            $table->string('supp_address',250);
            $table->string('cont_per_name',250);
            $table->string('cont_per_phone',250);
            $table->string('cont_per_mail',250);
            $table->boolean('supp_status');
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
        Schema::dropIfExists('suppliers');
    }
}
