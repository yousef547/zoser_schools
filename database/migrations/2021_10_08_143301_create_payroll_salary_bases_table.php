<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollSalaryBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_salary_bases', function (Blueprint $table) {
            $table->id();
            $table->string('salary_title',250);
            $table->decimal('salary_basic',10,0);
            $table->decimal('hour_overtime',10,0);
            $table->longText('salary_allowence');
            $table->longText('salary_deduction');
            $table->decimal('net_salary',10,0);
            $table->decimal('gross_salary',10,0);
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
        Schema::dropIfExists('payroll_salary_bases');
    }
}
