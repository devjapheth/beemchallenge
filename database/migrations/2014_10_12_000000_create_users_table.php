<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('avatar')->default('user.jpg');
            $table->string('reg_no')->nullable();
            $table->string('name');
            $table->string('program')->nullable();
            $table->string('email')->unique();
            $table->string('academic_year')->nullable();
            $table->string('accomodation')->nullable();
            $table->string('hostel')->nullable();
            $table->string('user_type')->default('admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default('$2y$10$IuLfZY0qbLD2pbZQodicn.w0Y0tsIYte6epYU7sVzCZhAODyCPb3e');
            $table->rememberToken();
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
