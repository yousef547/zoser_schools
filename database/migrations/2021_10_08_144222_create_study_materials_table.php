<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('week_id')->constrained();
            $table->mediumText('class_id');
            $table->mediumText('sectionId');
$table->integer('subject_id');
$table->integer('teacher_id');
$table->string('material_title',250);
$table->mediumText('material_description');
$table->string('material_file',250);

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
        Schema::dropIfExists('study_materials');
    }
}
