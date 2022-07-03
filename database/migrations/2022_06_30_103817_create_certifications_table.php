<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            // Foreign ID For Employee
            $table->foreignId('employee_id')->constrained('employees')->nullOnDelete();

            $table->string('name');
            $table->string('center_name');
            $table->json('specializations');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('certification_url');
            $table->string('certification_file');
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
        Schema::dropIfExists('certifications');
    }
}
