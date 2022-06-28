<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticalExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practical__experiences', function (Blueprint $table) {
            $table->id();
            // Foreign Key For Employee
            $table->foreignId('employee_id')->constrained('employees')->nullOnDelete();

            $table->string('job_title');
            $table->string('company_name');
            $table->json('specializations');
            $table->string('start_date');
            $table->string('end_date')->nullable();
            $table->text('description', 500);

            $table->foreignId('country_id')->constrained('employees')->nullOnDelete();

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
        Schema::dropIfExists('practical__experiences');
    }
}
