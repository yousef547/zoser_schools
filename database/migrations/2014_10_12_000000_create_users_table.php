<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',255);
            $table->string('email',255)->unique();
            $table->string('password',255);
            $table->rememberToken()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('fullName',255);
            $table->string('role',255);
            $table->foreignId('role_id')->constrained();
            $table->integer('department');
            $table->integer('designation');
            $table->boolean('actived')->default(true);
            $table->string('studentRollId',255)->nullable();
            $table->string('admission_number',255)->nullable();
            $table->integer('admission_date');
            $table->integer('std_category');
            $table->text('auth_session')->nullable();
            $table->integer('birthday')->default(0);
            $table->string('gender',255)->nullable();
            $table->text('address')->nullable();
            $table->string('phoneNo',255)->nullable();
            $table->string('mobileNo',255)->nullable();
            $table->integer('studentAcademicYear');
            $table->integer('studentClass')->default(0);
            $table->integer('studentSection')->default(0);
            $table->string('religion',255);
            $table->string('parentProfession',255)->nullable();
            $table->text('parentOf')->nullable();
            $table->string('photo',255)->nullable();
            $table->text('isLeaderBoard')->nullable();
            $table->string('restoreUniqId',255)->nullable();
            $table->integer('transport')->default(0);
            $table->integer('transport_vehicle')->default(0);
            $table->integer('hostel');
            $table->longText('medical')->nullable();
            $table->string('user_position',255)->nullable();
            $table->integer('defLang')->default(0);
            $table->string('defTheme',255)->nullable();
            $table->string('salary_type',255)->nullable();
            $table->integer('salary_base_id');
            $table->text('comVia');
            $table->text('father_info')->nullable();
            $table->text('mother_info')->nullable();
            $table->integer('biometric_id');
            $table->string('library_id',255)->nullable();
            $table->integer('account_active')->default(1);
            $table->string('customPermissionsType',255)->nullable();
            $table->text('customPermissions');
            $table->longText('firebase_token')->nullable();
            $table->longText('zoomLink');
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
        Schema::dropIfExists('users');
    }
}
