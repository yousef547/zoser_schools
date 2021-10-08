<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_name',255);
            $table->text('header_left');
            $table->text('header_right');
            $table->text('header_middle');
            $table->text('main_title');
            $table->text('main_content');
            $table->text('footer_left');
            $table->text('footer_right');
            $table->text('footer_middle');
            $table->string('certificate_image',255);
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
        Schema::dropIfExists('certificates');
    }
}
