<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailsmsTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailsms_templates', function (Blueprint $table) {
            $table->id();
            $table->string('templateTitle',250);
            $table->longText('templateMail');
            $table->text('templateSMS');
            $table->text('templateVars');
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
        Schema::dropIfExists('mailsms_templates');
    }
}
