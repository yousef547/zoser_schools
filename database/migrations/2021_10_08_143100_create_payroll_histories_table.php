<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('pay_by_userid');
            $table->string('salary_type',255);
            $table->decimal('salary_value' ,10, 0);
            $table->decimal('hour_overtime',10, 0);
            $table->decimal('hour_count',10, 0);
            $table->integer('pay_month');
            $table->integer('pay_year');
            $table->integer('pay_date');
            $table->decimal('pay_amount',10, 0);
            $table->decimal('pay_method',10, 0);
            $table->text('pay_comments');
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
        Schema::dropIfExists('payroll_histories');
    }
}
