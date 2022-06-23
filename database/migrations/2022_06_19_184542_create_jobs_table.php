<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->text('description');
            $table->enum('years_of_experience', ['0-2 سنوات', '5-2 سنوات', '10-5 سنوات', '+10 سنوات'])->default('0-2 سنوات');
            $table->enum('job_system', ['دوام جزئي', 'دوام كامل'])->default('دوام جزئي');
            $table->json('specialization');
            $table->json('languages');
            $table->integer('salary');
            $table->enum('status', ['Under-Review', 'Paying-Off', 'Opened', 'In-Progress','Closed', 'Canceled'])->default('Under-Review');
            $table->json('employee_applicants')->nullable();

            // Foreign Keys
            $table->foreignId('employer_id')->constrained('employers')->cascadeOnDelete();
            $table->foreignId('country_id')->constrained('employers')->cascadeOnDelete();
            $table->foreignId('field_id')->constrained('fields')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
