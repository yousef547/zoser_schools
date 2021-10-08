<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title',255);
            $table->string('page_permalink',255);
            $table->longText('page_content');
            $table->string('page_status',255);
            $table->string('page_visibility',255);
            $table->boolean('page_navbar_visible');
            $table->string('page_password',255);
            $table->string('page_publish_date',255);
            $table->integer('page_publish_specific_date')->length(255);
            $table->string('page_template',255);
            $table->text('page_feat_image');
            $table->longText('page_slider_images');
            $table->integer('page_order')->length(250)->default(0);

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
        Schema::dropIfExists('frontend_pages');
    }
}
