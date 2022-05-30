<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            // Foreign Key For User Model
            $table->foreignId('user_id')->constrained('users')->nullOnDelete();

            $table->string('avatar')->nullable();
            $table->string('job_title')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->json('skills')->nullable();
            $table->text('bio')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('salary')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->rememberToken();

            // Foreign Keys
            $table->foreignId('country_id')->constrained('countries')->nullOnDelete();
            $table->foreignId('language_id')->constrained('languages')->nullOnDelete();

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
        Schema::dropIfExists('employees');
    }
}
